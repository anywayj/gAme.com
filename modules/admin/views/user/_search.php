<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'id') ?>

    <?= $form->field($model, 'username')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\User::find()->all(), 'username','username'),
    [
        'prompt' => 'Выберите логин',
    ]
    ) ?>

    <?php // $form->field($model, 'auth_key') ?>

    <?php // $form->field($model, 'password_hash') ?>

    <?php // $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?= $form->field($model, 'status')->dropDownList([
                   
                    //'prompt' => 'Виберіть назву',
                    '0' => 'Забаненные',
                    '1' => 'Разрешены',
                ])
    ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?php // Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
