<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SparePart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spare-part-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'producer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'unit_type_id')->textInput() ?>

    <?= $form->field($model, 'unit_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
