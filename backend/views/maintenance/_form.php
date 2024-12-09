<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Maintenance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintenance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'maintenance_date')->textInput() ?>

    <?= $form->field($model, 'equipment_id')->textInput() ?>

    <?= $form->field($model, 'unit_id')->textInput() ?>

    <?= $form->field($model, 'next_maintenance')->textInput() ?>

    <?= $form->field($model, 'need_of_monitoring')->dropDownList([ 'vajadzīgs' => 'Vajadzīgs', 'nav vajadzīgs' => 'Nav vajadzīgs', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
