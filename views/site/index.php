<?php
use yii\helpers\Url;

$this->title = 'New Powered DataBase';

$dateStr = date('d.m.Y_H-i-s');
$logFileName = "wsLog_$dateStr.txt";
debug($logFileName);
?>
<script>
	let userName = 'Быков В.А.';

    function sendMess()
    {
        $.ajax({
            type: 'GET',
            url: 'index.php?r=site/index', //путь к скрипту, который обрабатывает задачу
            data: {
                send:true,
                userName: userName, // Кому отправляем
                toUser: 'ViewUser'
            },
            dataType:"json",
            success:function(data) {  //функция обратного вызова, выполняется в случае успешной отработки скрипта

            }
        });
    }


</script>
<script src="<?= "../js/webSocketConnect.js?ver=".time() ?>"></script>

<div class="row justify-content-left">
	<!-- <button type="button" class="btn btn-success" onclick="sendMess()">Send</button> -->

    <a href="<?= Url::to(['site/excel']) ?>" class="btn btn-outline-dark">Excel Test Page</a>
</div>

<div class="row justify-content-center" id="cards">

    <?php
        $c=0;
        for ($i = 0; $i < 12; $i++) {
            $c++;
    ?>
            <div class="card bg-light mb-1 mainCard" style="width: 9rem;">
                    <div class="card-header p-1 cursorPointer text-truncate bg-secondary text-white">
                        <small onclick = "copyValueToClipBoard(this)" class="float-left text-truncate" data-toggle="tooltip" data-placement="top" title="№3D">0006545</small>
                        <small onclick = "copyValueToClipBoard(this)" class="float-right text-truncate" data-toggle="tooltip" data-placement="top" title="Фабричный артикул">700654</small>
                        <div class="clearfix"></div>
                    </div>
                <a href="<?=Url::to(['site/view'])?>">
                    <div class="ratio">
                        <div class="ratio-inner ratio-4-3">
                            <div class="ratio-content">
                                <div class="labels_block_main">
                                    <span class="badge badge-primary label_main"><i class="fas fa-tag"></i> <small>Бриллианты</small></span>
                                    <span class="badge badge-success label_main"><i class="fas fa-tag"></i> <small>Срочное</small></span>
                                    <span class="badge badge-danger label_main"><i class="fas fa-tag"></i> <small>Экскримент</small></span>
                                </div>
                                <div class="status_main bg-light text-primary" data-toggle="tooltip" data-placement="top" title="Статус: 123"><i class="fas fa-print"></i></div>
                                <img src="images/testModels/<?=$c?>.png" class="card-img-top" alt="...">
                            </div>
                            <a class="btn btn-info btn-sm editBtnMain" href="<?=Url::to(['site/edit','id'=>34,'component'=>2])?>" role="button" data-toggle="tooltip" data-placement="bottom" title="Редактировать">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item p-1" style="font-size: small;">
                            <small class="float-left">Тип:</small>
                            <small class="float-right"><b>Кольцо</b></small>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                    <!--
                    <div class="card-footer p-1">
                        <small class="text-muted" data-toggle="tooltip" data-placement="top" title="Дата добавления"><i class="far fa-calendar-alt"></i> <?=date("m.d.y")?></small>
                    </div>
                    -->
                </a>
            </div>
    <?php
            if ( $c == 5) $c = 0;
        }
    ?>
</div>
