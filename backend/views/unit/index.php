<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ražošanas iekārtu mezgli un izejmateriāli';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Unit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'production_line_id',
                'value' => 'productionLine.name',
                'label' => 'Ražošanas Līnija'
            ],  
            [
                'attribute' => 'equipment_id',
                'value' => 'equipment.equipment_name',
                'label' => 'Līnijas iekārta'
            ],
            'unit_name',
            [
                'attribute' => 'unit_type_id',
                'value' => 'unitType.name',
                'label' => 'Mezgla tips'
            ],
            [
                'attribute' => 'next_maintenance',
                'value' => 'next_maintenance',
                'format' => ['date', 'm/d/Y'],
                'label' => 'Nākamā apkope'
            ],
            //'unit_function:ntext',
            //'unit_service_interval',
            //'unit_installation_date',
            //'unit_last_maintenance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
