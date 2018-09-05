<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Resourse */
/* @var $form yii\widgets\ActiveForm */
?>
<?php if(Yii::$app->user->identity->id === $model->user_id): ?>
<div class="resourse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?php // $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>




    <?= $form->field($model, 'count')->textInput()->label('Количество игровых ресурсов') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t("app", "Вернуться"), ["/resourse/index"] , ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php else: ?>
	<div class="alert alert-danger">
	<?= nl2br(Html::encode('Вы не являетесь владельцем данного ресурса, действия запрещены.')) ?>
	</div>
	<?= Html::a(Yii::t("app", "Вернуться"), ["/resourse/index"] , ['class' => 'btn btn-info']) ?>
<?php endif; ?>
