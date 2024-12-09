<?php

use backend\models\SparePart;
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SparePartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rezerves daļas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spare-part-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Izveidot Rezerves daļu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php 
    $gridColumns = [
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

        ['class' => 'yii\grid\ActionColumn'],
    ];

    // Renders a export dropdown menu
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'clearBuffers' => true, //optional
    ]);    

    // You can choose to render your own GridView separately
    ?>
    <?= \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns
    ]);?>
</div>
