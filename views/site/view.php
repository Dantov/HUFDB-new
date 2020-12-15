<?php
use yii\helpers\Url;
$this->title = 'View Model';

$tt=time();
$this->registerJsFile("@web/js/view/view.js?v=$tt");
$this->registerJsFile("@web/js/view/imageViewer.js?v=$tt");
$this->registerCssFile("@web/css/view/view.css?v=$tt");
?>

<script>
    let userName = 'ViewUser';

    function sendMess()
    {
        $.ajax({
            type: 'GET',
            url: 'index.php?r=site/view', //путь к скрипту, который обрабатывает задачу
            data: {
                send:true,
                userName: userName, // Кому отправляем
                toUser: 'EditUser'
            },
            dataType:"json",
            success:function(data) {  //функция обратного вызова, выполняется в случае успешной отработки скрипта

            }
        });
    }
</script>
<script src="<?= "../js/webSocketConnect.js?ver=".time() ?>"></script>

<div class="row justify-content-left">
	<button type="button" class="btn btn-success" onclick="sendMess()">Send</button>
</div>
<div class="row justify-content-center bg-light mb-2">
    <div class="col-sm">
        <div class="d-flex justify-content-between bg-dots">
            <div class="p-1 bg-light"><span>№3D:</span></div>
            <div onclick = "copyValueToClipBoard(this)" class="p-1 bg-light cursorPointer text-danger font-weight-bold" data-toggle="tooltip" data-placement="top" title="Копировать">0006766</div>
        </div>
        <div class="d-flex justify-content-between bg-dots">
            <div class="p-1 bg-light"><span>Фабричный Артикул:</span></div>
            <div onclick = "copyValueToClipBoard(this)" class="p-1 bg-light cursorPointer text-danger font-weight-bold" data-toggle="tooltip" data-placement="top" title="Копировать">700589</div>
        </div>
    </div>
    <div class="col-sm">
        <div class="d-flex justify-content-between bg-dots" id="complects">
            <div class="p-1 bg-light"><span>В Комплекте:</span></div>
            <div class="p-1 bg-light text-primary"><b><a imgtoshow="" class="text-primary" href="index.php?id=60">Серьги</a></b></div>
        </div>
    </div>
</div>

<div class="row justify-content-center mb-2">
    <div class="col-sm-12 col-md-6 bg-light pr-0" id="images_block">

        <div class="row">
            <div class="col-12 bg-primary text-white" title="Вышла готовая продукция!">
                <i class="far fa-thumbs-up float-left p-1"></i>
                <span class="text-center mx-auto">Вышел сигнал!</span>
                <small class="float-right p-1" title="Дата последнего изменения статуса" style="cursor:default;">15.05.2018&nbsp;</small>
            </div>
        </div>

        <div class="row">

            <div class="d-none d-sm-block col-sm-12 p-0 mb-2" id="mainImage">
                <!--<img src="images/testModels/8.png" class="loupeCursor" width="100%">-->
                <div class="mainImage" style="background-image: url(images/testModels/2.png);"></div>
            </div>

            <div class="col-12 pl-0">
                <div class="row p-0 m-0" id="bottomDopImages">
                    <div class="col-12 col-sm-6 col-md-3 p-0">
                        <div class="ratio border border-primary activeImage cursorPointer">
                            <div class="ratio-inner ratio-4-3">
                                <div class="ratio-content">
                                    <img src="images/testModels/2.png" class="" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0">
                        <div class="ratio border border-light cursorPointer">
                            <div class="ratio-inner ratio-4-3">
                                <div class="ratio-content">
                                    <img src="images/testModels/3.png" class="" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0">
                        <div class="ratio border border-light cursorPointer">
                            <div class="ratio-inner ratio-4-3">
                                <div class="ratio-content">
                                    <img src="images/testModels/5.png" class="" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0">
                        <div class="ratio border border-light cursorPointer">
                            <div class="ratio-inner ratio-4-3">
                                <div class="ratio-content">
                                    <img src="images/testModels/8.png" class="" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 p-0">
                        <div class="ratio border border-light cursorPointer">
                            <div class="ratio-inner ratio-4-3">
                                <div class="ratio-content">
                                    <img src="images/testModels/4.png" class="" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-sm-12 col-md-6 bg-light position-relative" id="descriptions">
        <div id="loupeBG" class="position-absolute d-none top-left bg-white"
             style="height: 500px; width: 500px; background-image: url('images/testModels/8.png'); background-repeat: no-repeat; background-size: 200%;">
        </div>
        <div class="pt-1 fontsView">
            <i class="fas fa-gem"></i>
            <span>Коллекция: </span>
            <strong>
                <i>
                    <a class="text-primary" href="../Main/controllers/setSort.php?sCollId=9" id="collection">Невесомость Циркон</a>
                </i>
            </strong>
        </div>
        <div class="fontsView">
            <span class="float-left">
                <i class="fas fa-user-edit"></i>
                Автор:
                <strong>
                    <span>Дзюба В.М.</span>
                </strong>
            </span>
            <span class="float-right">
                <strong>
                    <span>Быков В.А.</span>
                </strong>
                 :3D модельер
                <i class="fas fa-user-cog"></i>
            </span>
        </div>
        <div class="clearfix"></div>
        <hr>

        <div class="d-flex justify-content-start fontsView">
            <div class="p-1">
                <span class="badge badge-warning p-2"><i class="fas fa-tag"></i> <span class="">Срочное!</span></span>
            </div>
            <div class="p-1">
                <span class="badge badge-primary p-2"><i class="fas fa-tag"></i> <span class="">Литьё с камнями</span></span>
            </div>
            <div class="p-1">
                <span class="badge badge-danger p-2"><i class="fas fa-tag"></i> <span class="">Эксперимент</span></span>
            </div>
            <div class="p-1">
                <span class="badge badge-info p-2"><i class="fas fa-tag"></i> <span class="">Бриллианты</span></span>
            </div>
        </div>

        <div class="d-flex justify-content-between bg-dots fontsView">
            <div class="p-1 bg-light">
                <i class="far fa-eye" data-toggle="tooltip" data-placement="top" title="Вид модели"></i>
                <span class="d-none d-lg-inline">Вид модели</span>
            </div>
            <div class="p-1 bg-light"><b>Кольцо</b></div>
        </div>

        <div class="d-flex justify-content-between bg-dots fontsView">
            <div class="p-1 bg-light">
                <i class="fab fa-codepen" data-toggle="tooltip" data-placement="top" title="Металл"></i>
                <span class="d-none d-lg-inline">Металл</span>
            </div>
            <div class="p-1 bg-light">
                <b>
                    <span>Золото &nbsp;585°</span>&nbsp;
                    <span style="background-color: #f9c0a9; padding:3px; border-left: 2px solid #C71585;">&nbsp;Красное&nbsp;</span>
                </b>
            </div>
        </div>
        <div class="d-flex justify-content-between bg-dots fontsView">
            <div class="p-1 bg-light">
                <i class="fas fa-cube fasL" data-toggle="tooltip" data-placement="top" title="Покрытие"></i>
                <span class="d-none d-lg-inline">Покрытие</span>
            </div>
            <div class="p-1 bg-light">
                <b>
                    <span style="background-color: #efebeb; border-left: 2px solid #C71585;">&nbsp;Родирование&nbsp;</span>
                    Частичное, По крапанам.
                </b>
            </div>
        </div>
        <div class="d-flex justify-content-between bg-dots fontsView" style="display: none!important;">
            <div class="p-1 bg-light">
                <i class="fab fa-quinscape" data-toggle="tooltip" data-placement="top" title="Размерный Ряд"></i>
                <span class="d-none d-lg-inline">Размерный Ряд</span>
            </div>
            <div class="p-1 bg-light">
                <b>16,5-19рр</b>
            </div>
        </div>
        <hr>

        <div class="d-none d-lg-block">
            <?php require "includes/view/rind-sizes.php"?>
        </div>
        <div class="d-none d-lg-block">
            <?php require "includes/view/vc_links.php"?>
        </div>
        <div class="d-none d-lg-block" id="notes">
            <div class="alert alert-light" role="alert">
                <h5 class="alert-heading"><i class="fas fa-comment-alt"></i> Примечания:</h5>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
            </div>
        </div>
    </div>
</div>

<div class="row bg-light mb-2 d-lg-none pt-1" id="tablesSM">
    <div class="col-12">
        <?php require "includes/view/rind-sizes.php"?>
    </div>
    <div class="col-12">
        <?php require "includes/view/vc_links.php"?>
    </div>
</div>

<div class="row d-lg-none" id="notesSM">
    <div class="col">
        <div class="alert alert-light" role="alert">
            <h5 class="alert-heading"><i class="fas fa-comment-alt"></i> Примечания:</h5>
            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
        </div>
    </div>
</div>

<div class="row mb-2 bg-light" id="repairs">
    <div class="col pt-2 pb-2">
        <p>
            <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#repair1" aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-wrench"></i> Ремонт №<sapn class="repairNum">1</sapn> от <sapn class="repairDate"><?=date("d.m.Y")?></sapn>
            </button>
            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#repair2" aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-wrench"></i> Ремонт № <sapn>2</sapn>
            </button>
            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#repair3" aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-wrench"></i> Ремонт № <sapn>3</sapn>
            </button>
            <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#repair4" aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-wrench"></i> Ремонт № <sapn>4</sapn>
            </button>
        </p>
        <div class="collapse" id="repair1">
            <div class="card card-body">
                <div class="font-weight-bolder">Ремонт №<sapn class="repairNum">1</sapn></div>
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
            </div>
        </div>
        <div class="collapse" id="repair2">
            <div class="card card-body">
                <div class="font-weight-bolder">Ремонт №<sapn class="repairNum">2</sapn></div>
                Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения.
            </div>
        </div>
        <div class="collapse" id="repair3">
            <div class="card card-body">
                <div class="font-weight-bolder">Ремонт №<sapn class="repairNum">3</sapn></div>
                Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
            </div>
        </div>
        <div class="collapse" id="repair4">
            <div class="card card-body">
                <div class="font-weight-bolder">Ремонт №<sapn class="repairNum">4</sapn></div>
                Классический текст Lorem Ipsum, используемый с XVI века, приведён ниже. Также даны разделы 1.10.32 и 1.10.33 "de Finibus Bonorum et Malorum" Цицерона и их английский перевод, сделанный H. Rackham, 1914 год.
            </div>
        </div>
    </div>

</div>

<div class="row bg-light pb-2 pt-2" id="bottomRow">
    <div class="col">
        <div class="float-left">
            <div class="input-group">
                <div class="input-group-prepend">
                    <a href="<?=Url::previous()?>" role="button" class="btn btn-outline-secondary">
                        <i class="fas fa-caret-left"></i>
                        <span>Назад</span>
                    </a>
                    <a href="<?=Url::to(["site/edit", 'id'=>56, 'component'=>2])?>" role="button" class="btn btn-outline-info">
                        <i class="fas fa-pencil-alt"></i>
                        <span>Редактировать</span>
                    </a>
                </div>
                <select class="custom-select" id="printGroupSelect" aria-label="" data-toggle="tooltip" data-placement="top" title="Выбрать что печатать">
                    <option selected>Пасспорт</option>
                    <option value="1">Бегунок</option>
                    <option value="2">Схему</option>
                    <option value="3">Картинку</option>
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button" data-toggle="tooltip" data-placement="top" title="Нажать для печати">
                        <i class="fas fa-print"></i>
                    </button>
                </div>
            </div>
        </div>
        <small class="float-right p-2">
            <span title="Создатель">
                Добавил:&nbsp;<i>Быков В.А. </i>
            </span>
            <span title="Дата создания">
                <i>20.03.2018</i>
                <i class="fas fa-calendar-alt"></i>
            </span>
        </small>
    </div>
    <div class="clearfix"></div>
</div>

<div class="modal fade" id="imageViewer" style="height: 100%; width: 100%;" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered m-auto" style="height: 100%; max-width: 100%">
        <div class="modal-content p-0 m-0 imageViewer bg-transparent rounded-0">
            <div class="d-flex flex-row-reverse flex-row">
                <div class="p-2 pl-3 pr-3 bd-highlight rightPanel text-info closeImageViewer" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </div>
                <div class="p-2 pl-3 pr-3 bd-highlight text-info sizePlus rightPanel">
                    <i class="fas fa-search-plus"></i>
                </div>
                <div class="p-2 pl-3 pr-3 bd-highlight text-info sizeMinus rightPanel">
                    <i class="fas fa-search-minus"></i>
                </div>
            </div>
            <div class="d-flex flex-row bottomImgRow cursorPointer">
            </div>
        </div>
    </div>
</div>

