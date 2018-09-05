<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Resourse */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Resourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resourse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t("app", "Вернуться"), ["/resourse/index"] , ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'icon',
            'count',
        ],
    ]) ?>

</div>
