<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Resourse */

$this->title = 'Добавить платеж';
$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resourse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formpay', [
        'model' => $model,
    ]) ?>

</div>
