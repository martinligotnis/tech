<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SparePartSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spare-part-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'part_name') ?>

    <?= $form->field($model, 'producer') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'count') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'production_line_id') ?>

    <?php // echo $form->field($model, 'equipment_id') ?>

    <?php // echo $form->field($model, 'unit_id') ?>

    <?php // echo $form->field($model, 'unit_type_id') ?>

    <?= $form->field($model, 'in_stock') ?>

    <?= $form->field($model, 'min_stock_quantity') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
