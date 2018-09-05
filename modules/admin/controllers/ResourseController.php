<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Resourse;
use app\modules\admin\models\ResourseSearch;
use app\modules\admin\models\ImageUpload;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * ResourseController implements the CRUD actions for Resourse model.
 */
class ResourseController extends Controller
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
                        'actions' => ['index','view','delete','update','create','image'],
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
        $images = Resourse::find()->all();    

        $searchModel = new ResourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'images' => $images,
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

    /**
     * Creates a new Resourse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Resourse();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
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
     * Deletes an existing Resourse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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

    public function actionImage($id)
    {
        $model = new ImageUpload;

        if (Yii::$app->request->isPost) {
            $resourse = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'icon');
            $model->uploadFile($file);
            $resourse->saveImage($model->uploadFile($file));
            Yii::$app->session->setFlash('success', 'Иконка добавлена');
            return $this->redirect('index');
            
        }
    
        return $this->render('image', ['model' => $model]);
        
    }
}
