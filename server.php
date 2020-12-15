<?php
date_default_timezone_set('Europe/Kiev');

require_once __DIR__ . '/vendor/autoload.php';
use Workerman\Worker;

// массив для связи соединения пользователя и необходимого нам параметра
/*
[
    'user1' => [
        'Tab_2334235462' => object connection
        ...
    ],
]
*/

$dateStr = date('d.m.Y_H-i-s');
$logFileName = "wsLog_$dateStr.txt";

$users = [];

// создаём ws-сервер, к которому будут подключаться все наши пользователи
$ws_worker = new Worker("websocket://0.0.0.0:8000");

// создаём обработчик, который будет выполняться при запуске ws-сервера
$ws_worker->onWorkerStart = function() use (&$users, &$logFileName, $dateStr)
{
    if (!$handle = fopen($logFileName, 'a+')) {
        echo "Can't open or create log file ($logFileName)";
    }
    $dots = "\t\t*******************************\n";
    $welcome = "\tWeb Socket Server starts! " . date('d.m.Y') . " at " . date('H:i:s')."\n";
    fwrite($handle, $dots . $welcome . $dots);
    fclose($handle);

    // создаём локальный tcp-сервер, чтобы отправлять на него сообщения из кода нашего сайта
    $inner_tcp_worker = new Worker("tcp://127.0.0.1:1234");
	
    // создаём обработчик сообщений, который будет срабатывать,
    // когда на локальный tcp-сокет приходит сообщение
    $inner_tcp_worker->onMessage = function($connection, $data) use (&$users, &$logFileName, $dateStr)
    {
        $data = json_decode($data);
        $message = is_object($data->message) ? json_encode($data->message) : $data->message;

        // отправляем сообщение пользователю по userId на все вкладки
        if (isset($users[$data->user]))
        {
            $user = $users[$data->user];
            foreach ( $user as $tabName => $webConnection )
            {
                $webConnection->send($message);
            }

            //$webconnection = $users[$data->user];
            //$webconnection->send($data->message);

        } else { // иначе всем пользователям если нет Юзера в массиве $users
			// данные пиришли от TCP сервера. Информация о пользователе который инициировал эту передачу
			// должна находится в самих данных
            // нужно переделать. Пусть отправляет всем только по спец. значению, напр. AllUsers. иначе ничего не делает.
            /*
            
            fwrite($handle, "User = ".$data->user."\n");
            fwrite($handle, "Message = ".type($data->message)."\n");
            fclose($handle);*/
			if (!$handle = fopen($logFileName, 'a+')) echo "Can't open or create log file ($logFileName) \n";
			
			$text = "Message from TCP Server in " . $dateStr . "\n";
			fwrite($handle, $text);
			fclose($handle);
			echo  $text;
			
			foreach( $users as $user )
			{
                foreach( $user as $connObj )
                {
                    $connObj->send($message);
                }
			}
		}
    };
    $inner_tcp_worker->listen();
};

// присоединился клиент
$ws_worker->onConnect = function($connection) use (&$users, &$logFileName, $dateStr)
{
	//print_r($connection);
	
    $connection->onWebSocketConnect = function($connection) use (&$users, &$logFileName, $dateStr)
    {
		$user = $_GET['user']; // имя пользователя
		$tab = $_GET['tab']; // ID вкладки

        if (!$handle = fopen($logFileName, 'a+')) {
            echo "Can't open or create log file ($logFileName)";
        }
		
		$textInfo = "\n\t--- Users Info $dateStr ---\n";
        // при подключении нового пользователя сохраняем get-параметр, который же сами и передали со страницы сайта
		if ( !isset($users[$user]) ) 
		{
			$users[$user] = [];
            $users[$user][$tab] = $connection;

			$text = "New connection >>> " . $user . " <<< in " . $dateStr . "\n";
            fwrite($handle, $text);
			echo $text;
			$text = $user . " => " . $tab."\n";
			echo $text;
			//fwrite($handle, $text);
			
			////////////////////////////
			fwrite($handle, $textInfo);
			$textTabs = '';
			foreach ( $users as $user => $tabs ) $textTabs .= "\t".$user . " => " . count($tabs)." Tabs opened\n";
			fwrite($handle, $textTabs);
			$textUCount = "\n\t------- Total Users count ( ".count($users)." )------\n\n";
			fwrite($handle, $textUCount);
			fclose($handle);
			////////////////////////////
			
		} else {
			$users[$user][$tab] = $connection;

			$text = "User >>> ".$user." <<< comes with new tab.\n";
			echo $text;

			// перечисляет открытые табы
			/* $text = '';
			foreach ( $users[$user] as $tabID => $connObj )
			{
				$text = $user . " => " . $tabID."\n";
				fwrite($handle, $text);
				echo $text;
			} */
		}

        // посчитаем кол-во юзверов и открытых ими вкладок
		////////////////////////////
        echo $textInfo;
		$textTabs = '';
        foreach ( $users as $user => $tabs ) $textTabs .= "\t".$user . " => " . count($tabs)." Tabs opened\n";
        echo $textTabs;
        $textUCount = "\n\t------- Total Users count ( ".count($users)." )------\n\n";
        echo $textUCount;
		////////////////////////////
		
        // вместо get-параметра можно также использовать параметр из cookie, например $_COOKIE['PHPSESSID']
    };
};

// Получаем данные от клиента
$ws_worker->onMessage = function($connection, $data) use (&$users, &$logFileName)
{
    // Send hello $data
    $connection->send('hello ' . $data);
	print_r(json_decode($data));
};

//отрубился клиент
$ws_worker->onClose = function($connection) use (&$users, &$logFileName, $dateStr)
{
    // удаляем параметр при отключении пользователя
    //$user = array_search($connection, $users);
    $tabToDell = false;
    $userToDell = false;

    if (!$handle = fopen($logFileName, 'a+')) {
        echo "Can't open or create log file ($logFileName)";
    }

    foreach ( $users as $user => $tabs )
    {
        foreach ( $tabs as $tabId => $webConn )
        {
            if ( $webConn === $connection )
            {
                $userToDell = $user;
                $tabToDell = $tabId;
                break 2;
            }
        }
    }

    if ( $tabToDell )
    {
        unset($users[$userToDell][$tabToDell]);
		$text = "User >>> $userToDell => $tabToDell closed in $dateStr \n";
        //fwrite($handle, $text);
        echo $text;
    }
    if ( empty($users[$userToDell]) )
    {
        unset($users[$userToDell]);
		$text = "User >>> " . $userToDell." <<< Disconnected in $dateStr\n";
        fwrite($handle, $text);
        echo $text;
		
		// посчитаем кол-во юзверов и открытых ими вкладок
		////////////////////////////
		$textInfo = "\n\t--- Users Info $dateStr ---\n";
		fwrite($handle, $textInfo);
		echo $textInfo;
		
		$textTabs = '';
		foreach ( $users as $user => $tabs ) $textTabs .= "\t".$user . " => " . count($tabs)." Tabs opened\n";
		fwrite($handle, $textTabs);
		echo $textTabs;
		
		$textUCount = "\n\t------- Total Users count ( ".count($users)." )------\n\n";
		fwrite($handle, $textUCount);
		echo $textUCount;
		fclose($handle);
		////////////////////////////
    }

};

// Run worker
Worker::runAll();