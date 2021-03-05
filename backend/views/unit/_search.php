<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'equipment_id') ?>

    <?= $form->field($model, 'production_line_id') ?>

    <?= $form->field($model, 'unit_name') ?>

    <?= $form->field($model, 'unit_type_id') ?>

    <?php // echo $form->field($model, 'unit_function') ?>

    <?php // echo $form->field($model, 'unit_service_interval') ?>

    <?php // echo $form->field($model, 'unit_installation_date') ?>

    <?php // echo $form->field($model, 'unit_last_maintenance') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
