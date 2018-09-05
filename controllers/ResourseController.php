<?php

namespace app\controllers;

use Yii;
use app\models\Resourse;
use app\models\ResourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ArrayDataProvider;

/**
 * ResourseController implements the CRUD actions for Resourse model.
 */
class ResourseController extends Controller
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
                        'actions' => ['logout','index','view','update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                    [
                        'actions' => ['delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                  
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Resourse models.
     * @return mixed
     */

    public function actionIndex()
    {
        $res = new Resourse();
        $res->id = Yii::$app->user->identity->id;

        $resquery = Yii::$app->db->createCommand(
            "SELECT * 
             FROM resourse JOIN user
             ON resourse.user_id = user.id
             WHERE resourse.user_id = '$res->id' 
        ")->queryAll();

        $searchModel = new ResourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'resquery' => $resquery,
        ]);
    }

    /**
     * Displays a single Resourse model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    /**
     * Updates an existing Resourse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Finds the Resourse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resourse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resourse::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
