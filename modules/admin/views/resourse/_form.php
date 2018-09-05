<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\Resourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resourse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\User::find()->all(), 'id','username'),
    [
        'prompt' => 'Выберите пользователя',
    ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
