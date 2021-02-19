<?php

use backend\models\Equipment;
use backend\models\ProductionLine;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'equipment_id')->dropDownList(
        ArrayHelper::map(Equipment::find()->all(), 'id' , 'name')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'function')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'service_interval')->textInput() ?>

    <?= $form->field($model, 'installation_date')->textInput() ?>

    <?= $form->field($model, 'last_maintenance')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
