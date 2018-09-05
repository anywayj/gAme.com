<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Игровые ресурсы всех пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resourse-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'icon',
            'count',
            'user_id',

            [
                'header' => 'Логин',
                'attribute' => 'user.username',

            ],

            [
                'header' => 'Имя',
                'attribute' => 'user.recordusers.firstname',

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

    <h2>Ресурсы текущего пользователя</h2>
    <table class="table table-bordered table-condensed">
        <tr>
            <th>Наименование</th>
            <th>Иконка</th>
            <th>Кол-во</th>
        </tr>
        <?foreach($resquery as $res):?>
            <tr>
                <td><?=$res['name'];?></td>
                <td>
                    <?php if($res['icon']): ?>
                   <img src="/web/uploads/<?= $res['icon'] ?>"  width="5%" alt="фото"/>
                    <?php else: ?>
                       <img src="/web/uploads/owl.video.play.png" width="5%" alt="но-фото"/> 
                    <?php endif; ?>
                </td>
                <td><?=$res['count'];?></td>                
            </tr>
        <?endforeach?>
    </table>
