<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resourse-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'id') ?>

    <?php // $form->field($model, 'name') ?>

    <?php // $form->field($model, 'icon') ?>

    <?= $form->field($model, 'count')->label('Введите количество игровых ресурсов') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?php// Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
