<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

define('_rootDIR_', $_SERVER['DOCUMENT_ROOT'].'/');  // подключить скрипты
define('_webDIR_', $_SERVER['DOCUMENT_ROOT'].'/web/');  // подключить скрипты
define('_inclDIR_', $_SERVER['DOCUMENT_ROOT'].'/web/includes/');

define('_rootDIR_HTTP_', 'http://'.$_SERVER['HTTP_HOST'].'/'); // для ссылок
define('_web_HTTP_', _rootDIR_HTTP_.'web/'); // для ссылок

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

function debug($arr, $str='')
{
    echo '<pre>';
    if ($str) echo $str.' = ';
    print_r($arr);
    echo '</pre>';
}
if (!function_exists('array_key_first'))
{
    function array_key_first(array $array)
    {
        if (count($array))
        {
            reset($array);
            return key($array);
        }
        return null;
    }
}


(new yii\web\Application($config))->run();
