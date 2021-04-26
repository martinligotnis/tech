<?php

use yii\base\Model;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ražošanas iekārtu mezgli un izejmateriāli';
$this->params['breadcrumbs'][] = $this->title;

// if($this->next_maintenance < $this->unit_last_maintenance){
//     $class = 'red';
// } else {
//     $class = 'green';
// }
?>
<div class="unit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Izveidot mezglu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'unit_name',
            [
                'attribute' => 'equipment_id',
                'value' => 'equipment.equipment_name',
                'label' => 'Līnijas iekārta'
            ],
            [
                'attribute' => 'production_line_id',
                'value' => 'productionLine.name',
                'label' => 'Ražošanas Līnija'
            ],
            [
                'attribute' => 'unit_type_id',
                'value' => 'unitType.name',
                'label' => 'Mezgla tips'
            ],
            [
                'attribute' => 'next_maintenance',
                'value' => 'next_maintenance',
                'format' => 'date',
                'label' => 'Nākamā apkope',                
                'contentOptions' => function($model){
                    if( strtotime($model->next_maintenance) < strtotime(date("Y/m/d")) )
                    {
                        return ['class' => 'past-due'];
                    }
                    else
                    { 
                        return ['class' => 'on-time'];
                    }                    
                },
            ],
            //'unit_function:ntext',
            //'unit_service_interval',
            //'unit_installation_date',
            //'unit_last_maintenance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
