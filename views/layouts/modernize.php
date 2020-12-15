<?php

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <!-- Required meta tags -->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/favicon.ico?ver=<?=time()?>">
    <script src="../js/const.js?ver=<?=time()?>"></script>

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link href="../css/style.css?v=<?=time()?>" rel="stylesheet">
    <link href="../css/style4.css?v=<?=time()?>" rel="stylesheet">
    <link href="../css/styleDB.css?v=<?=time()?>" rel="stylesheet">
</head>

<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h1>
                <a href="index.html">ХЮФ&nbsp;3D</a>
            </h1>
            <span>3D</span>
        </div>
        <ul class="list-unstyled components">
            <li class="activeSB">
                <a href="#showSubmenu1" data-toggle="collapse" aria-expanded="false" class="sidebarMenuA">
                    <i class="fas fa-th-large"></i>
                    База Моделей
                    <i class="fas fa-angle-left fa-pull-right"></i>
                </a>
                <ul class="collapse list-unstyled" id="showSubmenu1">
                    <li>
                        <a href="index.html">
                            <i class="fas fa-th-large"></i>
                            Отобразить Плиткой
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            <i class="fas fa-th-list"></i>
                            Разбить по комплектам
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            <i class="far fa-edit"></i>
                            Режим выделения
                        </a>
                    </li>
                    <li>
                        <a href="index.html">
                            <i class="far fa-file-alt"></i>
                            Записать коллекцию в PDF
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#sortSubmenu1" data-toggle="collapse" aria-expanded="false" class="sidebarMenuA">
                    <i class="far fa-window-restore"></i>
                    Сортировка
                    <i class="fas fa-angle-left fa-pull-right"></i>
                </a>
                <ul class="collapse list-unstyled" id="sortSubmenu1">
                    <li>
                        <a href="#positionsSubmenu1" data-toggle="collapse" aria-expanded="false" class="sidebarMenuA">
                            <i class="fas fa-th"></i>
                            Позиций: 27
                            <i class="fas fa-angle-left fa-pull-right"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="positionsSubmenu1">
                            <li>
                                <a href="cards.html">27</a>
                            </li>
                            <li>
                                <a href="carousels.html">54</a>
                            </li>
                            <li>
                                <a href="forms.html">108</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#statusSubmenu1" data-toggle="collapse" aria-expanded="false" class="sidebarMenuA">
                            <i class="fab fa-black-tie"></i>
                            По: Статусу
                            <i class="fas fa-angle-left fa-pull-right"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="statusSubmenu1">
                            <li>
                                <a href="cards.html">1</a>
                            </li>
                            <li>
                                <a href="carousels.html">2</a>
                            </li>
                            <li>
                                <a href="forms.html">3</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#bySubmenu" data-toggle="collapse" aria-expanded="false" class="sidebarMenuA">
                            <i class="far fa-calendar-alt"></i>
                            По: Дате
                            <i class="fas fa-angle-left fa-pull-right"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="bySubmenu">
                            <li>
                                <a href="cards.html">Cards</a>
                            </li>
                            <li>
                                <a href="carousels.html">Carousels</a>
                            </li>
                            <li>
                                <a href="forms.html">Forms</a>
                            </li>
                            <li>
                                <a href="modals.html">Modals</a>
                            </li>
                            <li>
                                <a href="tables.html">Tables</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#growingSubmenu" data-toggle="collapse" aria-expanded="false" class="sidebarMenuA">
                            <i class="fas fa-sort-amount-up-alt"></i>
                            По: Возрастанию
                            <i class="fas fa-angle-left fa-pull-right"></i>
                        </a>
                        <ul class="collapse list-unstyled" id="growingSubmenu">
                            <li>
                                <a href="cards.html">Возрастанию</a>
                            </li>
                            <li>
                                <a href="carousels.html">Убыванию</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <a href="widgets.html">
                    <i class="far fa-file"></i>
                    Создать модель
                </a>
            </li>
            <li>
                <a href="maps.html">
                    <i class="far fa-list-alt"></i>
                    Номенклатура
                </a>
            </li>
            <li>
                <a href="#noticesSubmenu" data-toggle="collapse" aria-expanded="false" class="sidebarMenuA">
                    <i class="far fa-bell"></i>
                    Оповещения
                    <span class="badge badge-secondary bg-danger">5 Новых</span>
                    <i class="fas fa-angle-left fa-pull-right"></i>
                </a>
                <ul class="collapse list-unstyled" id="noticesSubmenu">
                    <li>
                        <a href="cards.html" class="p-2 border-bottom border-secondary">
                            <span>Изменен статус</span><br>
                            <img src="images/2.jpg" width="50px" class="mr-2">
                            <span>0004588 / 700568</span><br>
                            <span>Редактировал: Жопа</span>
                        </a>
                    </li>
                    <li>
                        <a href="cards.html" class="p-2 border-bottom border-secondary">
                            <span>Добавлена новая модель</span><br>
                            <img src="images/3.jpg" width="50px" class="mr-2">
                            <span>0007548</span><br>
                            <span>Добавил: Быков</span>

                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- Page Content Holder -->
    <div id="content">
        <!-- top-bar -->
        <nav class="navbar mb-2" style="margin: -10px -10px 0 -10px; display: block!important;">
            <div class="d-flex justify-content-between bd-highlight">
                <div class="p-1 bd-highlight">
                    <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn bg-dark">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
                <div class="p-1 bd-highlight" id="search-form">
                    <form action="#" method="post" class="pt-1 mx-auto">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <button type="submit" title="Нажать для поиска" class="btn btn-outline-secondary border-0"><i class="fas fa-search"></i></button>
                            </div>
                            <input type="text" type="search" placeholder="Поиск..." aria-label="Search" required="" class="form-control border-top-0 border-left-0 border-right-0">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary border-0 dropdown-toggle" type="button" title="Где искать" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>В Базе</span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">В Базе</a>
                                    <a class="dropdown-item" href="#">В Коллекции</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="p-1 bd-highlight">
                    <ul class="user-bar top-icons-agileits-w3layouts">
                        <li class="nav-item dropdown mr-3" title="Список коллекций">
                            <span class="d-none d-lg-inline">Все Коллекции</span>
                            <button type="button" data-toggle="modal" data-target="#collectionsModal" class="btn btn-info navbar-btn bg-info">
                                <i class="fas fa-gem"></i>
                            </button>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" style="" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <div class="profile-l mr-0">
                                    <img src="images/defaultUser2.png" class="img-fluid" alt="Responsive image">
                                </div>
                            </a>
                            <div class="dropdown-menu drop-3">
                                <div class="profile-r align-self-center">
                                    <h3 class="sub-title-w3-agileits">Манюк Павел</h3>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item mt-2">
                                    <h4><i class="far fa-user mr-3"></i>Профиль</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-2">
                                    <h4><i class="fas fa-tools mr-3"></i></i>Настройки</h4>
                                </a>
                                <a href="#" class="dropdown-item mt-2">
                                    <h4><i class="fas fa-chart-pie mr-3"></i>Статистика</h4>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.html">Выход</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex justify-content-between bd-highlight navBar600Plus">
                <div class="pb-1"></div>
                <div class="pb-1">
                    <form action="#" method="post" class="pt-1 mx-auto">
                        <div class="input-group input-group-sm">
                            <div class="input-group-prepend">
                                <button type="submit" title="Нажать для поиска" class="btn btn-outline-secondary border-0"><i class="fas fa-search"></i></button>
                            </div>
                            <input type="text" type="search" placeholder="Поиск..." aria-label="Search" required="" class="form-control border-top-0 border-left-0 border-right-0">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary border-0 dropdown-toggle" type="button" title="Где искать" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span>В Базе</span>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">В Базе</a>
                                    <a class="dropdown-item" href="#">В Коллекции</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="pb-1"></div>
            </div>
        </nav>
        <!--// top-bar -->
        <!-- Collections Modal -->
        <div class="modal fade bd-example-modal-xl" id="collectionsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header p-2">
                        <h5 class="modal-title" id="exampleModalLabel">Список Коллекций</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-1">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="card border-0 rounded-0" style="width: 14rem;">
                                    <div class="card-header bg-light">Золото</div>
                                    <div class="list-group border-right" style="font-size: small;">
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action">Morbi leo risus</a>
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action">Серебро с Золотыми накладками</a>
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Vestibulum at eros</a>
                                    </div>
                                </div>
                                <div class="card border-0 rounded-0" style="width: 14rem;">
                                    <div class="card-header bg-light">Серебро</div>
                                    <div class="list-group border-right" style="font-size: small;">
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action">Morbi leo risus</a>
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action">Porta ac consectetur ac</a>
                                    </div>
                                </div>
                                <div class="card border-0 rounded-0" style="width: 14rem;">
                                    <div class="card-header bg-light">Бриллианты</div>
                                    <div class="list-group border-right" style="font-size: small;">
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action">Morbi leo risus</a>
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action">Porta ac consectetur ac</a>
                                    </div>
                                </div>
                                <div class="card border-0 rounded-0" style="width: 14rem;">
                                    <div class="card-header bg-light">Разное</div>
                                    <div class="list-group" style="font-size: small;">
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action">Morbi leo risus</a>
                                        <a href="#" class="p-2 border-0 list-group-item list-group-item-action">Porta ac consectetur ac</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="text-xl-left">stats:</span>
                    </div>
                </div>
            </div>
        </div>
        <!--// Collections Modal -->

        <div class="container-fluid" id="wrapp">
            <?= $content; ?>
        </div>

        <!-- Copyright -->
        <div class="copyright-w3layouts shadow py-xl-3 py-2 mt-2 text-center" id="footer">
            <p class="float-left ml-3">Developed by Vadym Bykov</p>
            <p class="float-right mr-3"> ver2.0.0wip</p>
            <div class="clearfix"></div>
        </div>
        <!--// Copyright -->
    </div>
</div>

<?php $this->endBody() ?>
<!-- loading-gif Js -->
<script>
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).on('load',function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });
</script>
<!--// loading-gif Js -->

<!-- Sidebar-nav Js -->
<script>
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
<!--// Sidebar-nav Js -->

<!-- Tooltip -->
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });
</script>
<!-- //Tooltip -->
<!-- Копирование при клике на №3Д и артикул -->
<script>
    //let cards = document.getElementById('cards');

    function copyValueToClipBoard(containerid) {
        window.getSelection().removeAllRanges();
        var range = document.createRange();
        range.selectNode(containerid);
        window.getSelection().addRange(range);
        try {
            // Now that we've selected the anchor text, execute the copy command
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful' : 'unsuccessful';
            console.log('Copy was ' + msg);
            setTimeout(function(){
                window.getSelection().removeAllRanges();
            },300);
        } catch(err) {
            console.log('Oops, unable to copy');
        }
        // Remove the selections - NOTE: Should use
        // removeRange(range) when it is supported
    }

</script>
<!-- //copy -->
<script src="js/sidebar.js?v=<?=time()?>"></script>
</body>
</html>
<?php $this->endPage() ?>