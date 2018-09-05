<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
?>

<div class="teachers-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'icon')->widget(FileInput::classname(), [ 
	    'options' => ['accept' => 'uploads/*'],
				])->label('Выберите иконку (png, jpg)') ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success',  'data-confirm']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
