<?php

/* @var $this yii\web\View */

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <h2>Iekārtu mezgli</h2>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                'part_name',
                'producer',
                'model',
                'count',
                //'description:ntext',
                [
                    'attribute' => 'production_line_id',
                    'value' => 'productionLine.name',
                    'label' => 'Ražošanas līnija',
                ],
                [
                    'attribute' => 'equipment_id',
                    'value' => 'equipment.equipment_name',
                    'label' => 'Līnijas iekārta',
                ],
                [
                    'attribute' => 'unit_id',
                    'value' => 'unit.unit_name',
                    'label' => 'Iekārtas mezgls',
                ],
                //'unit_type_id',
                'in_stock',
                'min_stock_quantity',

                // ['class' => 'yii\grid\ActionColumn'],
            ],
            'condensed' => true,
            'hover' => true,
            'striped' => false,
        ]); ?>          
    </div>
</div>
