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

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'function') ?>

    <?php // echo $form->field($model, 'service_interval') ?>

    <?php // echo $form->field($model, 'installation_date') ?>

    <?php // echo $form->field($model, 'last_maintenance') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
