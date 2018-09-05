<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\datetime\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Resourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'date')->textInput(['disabled' => 'disabled']) ?>

    <?php echo $form->field($model, 'date')->widget(DateTimePicker::classname(), [
                'options' => ['placeholder' => 'Начало...'],
                'removeButton' => false,
                //'convertFormat' => true,
                'pluginOptions' => [
                    'autoclose' => true,
                    //'format' => 'dd-M-yyyy hh:ii'
                ]
            ]);
    ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'count') ?>

    <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\User::find()->all(), 'id','username'), ['disabled' => 'disabled']) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
