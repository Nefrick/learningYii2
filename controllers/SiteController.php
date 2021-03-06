<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Monster;
class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //$this->actionLoadMonsters();
        return $this->render('index');
    }
    public function actionLoadMonsters()
    {
        Monster::deleteAll();
        $monsterData = [
            [
                'name' => 'Dracula',
                'age' => 999,
                'gender' => 'm',
                'username' => 'fangman999',
                'password' => 'yummyblood'
            ],
            [
                'name' => 'Frankenstein',
                'age' => 2,
                'gender' => 'm',
                'username' => 'stitchedtogether',
                'password' => 'boltneck'
            ],
            [
                'name' => 'Medusa',
                'age' => 34,
                'gender' => 'f',
                'username' => 'snakehairgirl',
                'password' => 'dontlooknow'
            ],
            [
                'name' => 'Mummy',
                'age' => 86,
                'gender' => 'm',
                'username' => 'dirtyragdude',
                'password' => 'wrappedtight'
            ],
            [
                'name' => 'Wicked Witch',
                'age' => 40,
                'gender' => 'f',
                'username' => 'broomrider4eva',
                'password' => 'getyoumypretty'
            ],
            [
                'name' => 'Wicked Witch2',
                'age' => 44,
                'gender' => 'f',
                'username' => 'broomrider4eva2',
                'password' => 'getyoumypretty2'
            ],
        ];
        foreach ($monsterData as $data) {
            $monster = new Monster($data);
            $monster->hashPassword = true;
            $monster->save();
        }
    }
    /**
     * Login action.
     *
     * @return string
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
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
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
