<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public $layout = 'admin';

	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
               // 'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login','error','signup'],
                        'allow' => true,
                    ],

                    [
                        'actions' => ['index','view','delete','update','create'],
                        'allow' => true,
                        'roles' => ['admin'],
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
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {
        return $this->render('index');
    }

    

}
