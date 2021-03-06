<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Iekārtas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Izveidot iekārtu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'equipment_name',
            [
                'attribute' => 'production_line_id',
                'value' => 'productionLine.name',
                'label' => 'Ražošanas līnija'
            ],  

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
