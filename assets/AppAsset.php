<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/bootstrap.min.css',
        'css/bar.css',
        'css/pignose.calender.css',
        //'css/style.css',
        //'css/style4.css',
        //'css/styleDB.css',
        'css/simplyCountdown.css', //Count-down
        'fontawesome5.9.0/css/all.min.css',
    ];
    public $js = [
        'js/jquery-3.4.1.min.js',
        'js/modernizr.js',   //loading-gif Js
        'js/SimpleChart.js', //Graph
        'js/rumcaJS.js',     //Bar-chart
        'js/example.js',     //Bar-chart
        'js/moment.min.js',  //Calender
        'js/pignose.calender.js',  //Calender
        'js/script.js',     //profile-widget-dropdown
        //'js/simplyCountdown.js',     //Count-down
        'js/amcharts.js',     //pie-chart

        //'js/popper.min.js',
        'js/bootstrap.bundle.min.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
