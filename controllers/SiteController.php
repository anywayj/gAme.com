<?php

namespace app\controllers;

use Yii;
use yii\filters\{AccessControl,VerbFilter};
use yii\web\{UploadedFile,Controller,Response};
use app\models\{LoginForm,ContactForm,SignupForm,SignupFormtwo,RecordUser,User,Form1,Bids,Events,Payments,ImageUpload};

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
               // 'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login','error','signup','index'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout','index','profile','payments','createpay','payments','image'],
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/site/login');
        }

       

        return $this->render('index');
        
    }


    public function actionSignup()
    {

        $model = new SignupForm();
            $model->created_at = date("Y-m-d");
            $model->updated_at = date("Y-m-d");
        $modelnew = new SignupFormtwo();
        if ($model->load(Yii::$app->request->post()) && $modelnew->load(Yii::$app->request->post())) {
            if ($user = $model->signup() && $user1 = $modelnew->signuptwo()) {
               return $this->redirect('/site/login');
        
            }  
        }

        return $this->render('signup', compact('model','modelnew'));
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

    public function actionProfile($id)
    {

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('profile', [
            'model' => $model,
        ]);
    }

    public function actionImage($id)
    {
        $model = new ImageUpload;

        if (Yii::$app->request->isPost) {
            $avatar = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'avatarimage');
            $model->uploadFile($file);
            $avatar->saveImage($model->uploadFile($file));
            return $this->redirect('index');
            
        }
    
        return $this->render('image', ['model' => $model]);
        
    }

    protected function findModel($id)
    {
        if (($model = RecordUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionCreatepay()
    {
        $model = new Payments();
        $model->date = date("Y-m-d H:i:s");
        $model->user_id = Yii::$app->user->identity->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->amount = $model->count*$model->price;
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['payments']);}
        }

        return $this->render('createpay', [
            'model' => $model,
        ]);
    }

    public function actionPayments()
    {
        $pay = new Payments();
        $pay->id = Yii::$app->user->identity->id;

        $payquery = Yii::$app->db->createCommand(
            "SELECT * 
             FROM payments JOIN user
             ON payments.user_id = user.id
             WHERE payments.user_id = '$pay->id' 
        ")->queryAll();

        return $this->render('payments', compact('payquery'));

    }


}
