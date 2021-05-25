<?php

use backend\models\SparePart;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SparePartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mezglu daļas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spare-part-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Izveidot Mezgla daļu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
