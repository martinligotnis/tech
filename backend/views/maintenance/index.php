<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaintenanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maintenances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintenance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Maintenance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'maintenance_date',
            'equipment_id',
            'unit_id',
            'next_maintenance',
            //'need_of_monitoring',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
