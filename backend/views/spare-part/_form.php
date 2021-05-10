<?php

use backend\models\Equipment;
use backend\models\ProductionLine;
use backend\models\Unit;
use backend\models\UnitType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SparePart */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spare-part-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'production_line_id')->dropDownList(
        ArrayHelper::map(ProductionLine::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Izvēlieties ražošanas līniju',
            'onchange' => '
                $.post( "index.php?r=unit/lists&id=' . '"+$(this).val(), function( data2 ) {
                    $( "select#sparepart-equipment_id" ).html( data2 ); 
                });
            ',
        ]
    );?>

    <?= $form->field($model, 'equipment_id')->dropDownList(
        ArrayHelper::map(Equipment::find()->all(), 'id', 'equipment_name'),
        //lists is action method declared in model
        [
            'prompt' => 'Izvēlieties iekārtu',
            'onchange' => '
                $.post( "index.php?r=spare-part/lists&id=' . '"+$(this).val(), function( data ) {
                    $( "select#sparepart-unit_id" ).html( data ); 
                });
            ',
        ]
    );?>

    <?= $form->field($model, 'unit_id')->dropDownList(
        ArrayHelper::map(Unit::find()->all(), 'id', 'unit_name'),
        [
            'prompt' => 'Izvēlieties iekārtas mezglu',
        ]
    );?>

    <?= $form->field($model, 'unit_type_id')->dropDownList(
        ArrayHelper::map(UnitType::find()->all(), 'id', 'name'),
        [
            'prompt' => 'Izvēlieties daļas tipu',
        ]
    );?>

    <?= $form->field($model, 'part_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'producer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'in_stock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'min_stock_quantity')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Saglabāt', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
