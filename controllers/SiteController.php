<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TestExcel;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     *
     * @param string $userName
     * @param string $toUser
     */
    protected function webSocketWorker($userName = '', $toUser = '')
    {
        if ( !$toUser ) $toUser = "TestUser";

        $localsocket = 'tcp://127.0.0.1:1234';

        $message = "Message to $toUser! Hello from $userName This is Tester. Time is " . date('h:i:s');

        // соединяемся с локальным tcp-сервером
        $instance = stream_socket_client($localsocket);

        // отправляем сообщение
        fwrite($instance, json_encode(['user' => $toUser, 'message' => $message]) . "\n");
    }


    /**
     * Displays Base Page.
     *
     * @return string
     */
    public function actionIndex()
    {
		$request = Yii::$app->request;
		if ( $request->isAjax && $request->get('send') )
		{
			$this->webSocketWorker($request->get('userName'), $request->get('toUser'));
			exit;
		}

        return $this->render('index');
    }

    /**
     * Displays View Page.
     *
     * @return string
     */
    public function actionView()
    {
		
		$request = Yii::$app->request;
		if ( $request->isAjax && $request->get('send') )
		{
            $this->webSocketWorker($request->get('userName'), $request->get('toUser'));
            exit;
		}
		
        return $this->render('view');
    }

    /**
     * Displays View Page.
     *
     * @return string
     */
    public function actionEdit()
    {

		$request = Yii::$app->request;
		if ( $request->isAjax && $request->get('send') )
		{
            $this->webSocketWorker($request->get('userName'), $request->get('toUser'));
            exit;
		}
		
        $get = $request->get();

        $edit = $request->get('edit');
        $xmp = $request->get('xmp');
		
        return $this->render('edit',compact('get','edit','xmp'));
    }

    public function actionExcel()
    {
        $request = Yii::$app->request;
        if ( $request->isAjax && $request->get('testExcell') )
        {
            $excelTest = new TestExcel();

            $excelTest->testExcel();

            exit;
        }

        return $this->render('excel');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
