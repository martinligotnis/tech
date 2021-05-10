<?php

use backend\models\Equipment;
use backend\models\ProductionLine;
use backend\models\UnitType;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data', 'class' => 'model-form'],
    ]); ?>

    <?= $form->field($model, 'production_line_id')->dropDownList(
        ArrayHelper::map(ProductionLine::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Izvēlieties ražošanas līniju',
            'onchange' => '
                $.post( "index.php?r=unit/lists&id=' . '"+$(this).val(), function( data ) {
                    $( "select#unit-equipment_id" ).html( data ); 
                });
            ',
        ]
    );?>


    <?= $form->field($model, 'equipment_id')->dropDownList(
        ArrayHelper::map(Equipment::find()->all(), 'id', 'equipment_name'),
        [
            'prompt' => 'Izvēlieties iekārtu',
        ]
    );?>

    <?= $form->field($model, 'unit_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_type_id')->dropDownList(
        ArrayHelper::map(UnitType::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Izvēlieties mezgla tipu',
        ]
    );?>

    <?= $form->field($model, 'unit_function')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'unit_service_interval')->textInput() ?>

    <?= $form->field($model,'unit_installation_date')->widget(DateTimePicker::classname([
            'name' => 'date',
            'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
            'options' => ['placeholder' => 'Izvēlieties datumu...'],
            'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
            'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
            'pluginOptions' => [
                'language' => 'lv',
                'minuteStep' => '60',
                'minView' => '2',
                'maxView' => '2',
                //'startView' => '3',
                'format' => 'dd.mm.yyyy', // формат который будет передаваться в базу
                'autoclose' => true, //авто закрытие
                'weekStart' => 1, //с какого дня начинается неделя
                'startDate' => date('Ymd'), //дата ниже которой нельзя установить значение
                'todayBtn' => true, // выбрать сегодняшнюю дату
                'todayHighlight' => true, // подсветка сегодняшнего дня
            ]
        ]));?>

    <?= $form->field($model,'unit_last_maintenance')->widget(DateTimePicker::classname([
            'name' => 'date',
            'type' => DateTimePicker::TYPE_COMPONENT_APPEND,
            'options' => ['placeholder' => 'Izvēlieties datumu...'],
            'pickerIcon' => '<i class="fas fa-calendar-alt text-primary"></i>',
            'removeIcon' => '<i class="fas fa-trash text-danger"></i>',
            'pluginOptions' => [
                'language' => 'lv',
                'minuteStep' => '60',
                'minView' => '2',
                'maxView' => '2',
                //'startView' => '3',
                'format' => 'dd.mm.yyyy', // формат который будет передаваться в базу
                'autoclose' => true, //авто закрытие
                'weekStart' => 1, //с какого дня начинается неделя
                'startDate' => date('Ymd'), //дата ниже которой нельзя установить значение
                'todayBtn' => true, // выбрать сегодняшнюю дату
                'todayHighlight' => true, // подсветка сегодняшнего дня
            ]
        ]));?>

    <?= $form->field($model, 'extra_maintenance')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
