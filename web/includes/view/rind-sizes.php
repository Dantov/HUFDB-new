<?php
    $v = rand(1,100);
?>
<nav>
    <div class="nav nav-pills fontsView" id="pills-tab<?=$v?>" role="tablist">
        <sapn class="p-1"><b>Размерный Ряд: </b></sapn>
        <a class="nav-item nav-link pt-1 pb-1 pl-2 pr-2 mr-1 border border-secondary active" id="nav-home<?=$v?>-tab"    data-toggle="tab" href="#nav-home<?=$v?>"    role="tab" aria-controls="nav-home<?=$v?>"    aria-selected="true">16</a>
        <a class="nav-item nav-link pt-1 pb-1 pl-2 pr-2 mr-1 border border-secondary"        id="nav-profile<?=$v?>-tab" data-toggle="tab" href="#nav-profile<?=$v?>" role="tab" aria-controls="nav-profile<?=$v?>" aria-selected="false">18</a>
        <a class="nav-item nav-link pt-1 pb-1 pl-2 pr-2 mr-1 border border-secondary"        id="nav-contact<?=$v?>-tab" data-toggle="tab" href="#nav-contact<?=$v?>" role="tab" aria-controls="nav-contact<?=$v?>" aria-selected="false">19.5</a>
    </div>
</nav>
<div class="tab-content" id="pills-tab<?=$v?>Content">
    <div class="tab-pane fade show active" id="nav-home<?=$v?>" role="tabpanel" aria-labelledby="nav-home<?=$v?>-tab">
        <div class="d-flex fontsView justify-content-between bg-dots">
            <div class="p-1 bg-light"><i class="fas fa-balance-scale-left"></i> <span>Вес в 3D</span></div>
            <div class="p-1 bg-light"><b>3.1 гр.<?="version= ".$v?></b></div>
        </div>
        <div class="p-1 bg-info fontsView text-white Nit_gems">
            <i class="far fa-gem"></i>
            <span>Вставки 3D:</span>
        </div>
        <table class="table text-muted table_gems">
            <thead>
            <tr>
                <th>№</th><th>Размер</th><th>Кол-во</th><th>Огранка</th><th>Сырьё</th><th>Цвет</th>
            </tr>
            </thead>
            <tbody class="tbody_gems">
            <tr>
                <td>1</td>
                <td>Ø4 мм</td>
                <td>1 шт</td>
                <td>Круг</td>
                <td>Циркон</td>
                <td>Белый</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ø1 мм</td>
                <td>30 шт</td>
                <td>Круг</td>
                <td>Циркон</td>
                <td>Белый</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-profile<?=$v?>" role="tabpanel" aria-labelledby="nav-profile<?=$v?>-tab">
        <div class="d-flex justify-content-between bg-dots">
            <div class="p-1 bg-light"><i class="fas fa-balance-scale-left"></i> <span>Вес в 3D</span></div>
            <div class="p-1 bg-light"><b>3.2 гр.</b></div>
        </div>
        <div class="p-1 bg-info text-white Nit_gems">
            <i class="far fa-gem"></i>
            <span>Вставки 3D:</span>
        </div>
        <table class="table text-muted table_gems">
            <thead>
            <tr>
                <th>№</th><th>Размер</th><th>Кол-во</th><th>Огранка</th><th>Сырьё</th><th>Цвет</th>
            </tr>
            </thead>
            <tbody class="tbody_gems">
            <tr>
                <td>1</td>
                <td>Ø4 мм</td>
                <td>1 шт</td>
                <td>Круг</td>
                <td>Циркон</td>
                <td>Белый</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ø1 мм</td>
                <td>34 шт</td>
                <td>Круг</td>
                <td>Циркон</td>
                <td>Белый</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="nav-contact<?=$v?>" role="tabpanel" aria-labelledby="nav-contact<?=$v?>-tab">
        <div class="d-flex justify-content-between bg-dots">
            <div class="p-1 bg-light"><i class="fas fa-balance-scale-left"></i> <span>Вес в 3D</span></div>
            <div class="p-1 bg-light"><b>3.3 гр.</b></div>
        </div>
        <div class="p-1 bg-info text-white Nit_gems">
            <i class="far fa-gem"></i>
            <span>Вставки 3D:</span>
        </div>
        <table class="table text-muted table_gems">
            <thead>
            <tr>
                <th>№</th><th>Размер</th><th>Кол-во</th><th>Огранка</th><th>Сырьё</th><th>Цвет</th>
            </tr>
            </thead>
            <tbody class="tbody_gems">
            <tr>
                <td>1</td>
                <td>Ø4 мм</td>
                <td>1 шт</td>
                <td>Круг</td>
                <td>Циркон</td>
                <td>Белый</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ø1 мм</td>
                <td>38 шт</td>
                <td>Круг</td>
                <td>Циркон</td>
                <td>Белый</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
