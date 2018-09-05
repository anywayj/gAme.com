<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    
        <?php // Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            

            //'id',
            'username',
            'status',
           // 'created_at',
           // 'updated_at',
            [
                'header' => 'Имя',
                'attribute' => 'recordusers.firstname',
            ],
            [
                'header' => 'Фамилия',
                'attribute' => 'recordusers.lastname',

            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Действия', 
                'headerOptions' => ['width' => '80'],
                'template' => '{view} {update} {delete}{link}',
            ],

            [
                'attribute'=>'created_at',
                'label'=>'Создано',
                'format'=>'datetime', // Доступные модификаторы - date:datetime:time
                'headerOptions' => ['width' => '200'],
            ],

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
