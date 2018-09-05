<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Resourse */

$this->title = 'Добавить ресурсы';
$this->params['breadcrumbs'][] = ['label' => 'Resourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resourse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
