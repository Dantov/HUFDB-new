<?php


namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class DataController extends Controller
{

    public $layout = 'base_layout';

    public function actionIndex()
    {
        return $this->render('index');
    }


}