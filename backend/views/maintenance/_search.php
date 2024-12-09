<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaintenanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintenance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'maintenance_date') ?>

    <?= $form->field($model, 'equipment_id') ?>

    <?= $form->field($model, 'unit_id') ?>

    <?= $form->field($model, 'next_maintenance') ?>

    <?php // echo $form->field($model, 'need_of_monitoring') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
