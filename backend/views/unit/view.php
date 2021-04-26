<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Unit */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Units', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atjaunot', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Dzēst', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'unit_name',
            [
                'attribute' => 'production_line_id',
                'value' => $model->productionLine->name,
                'label' => 'Ražošanas Līnija'
            ],
            [
                'attribute' => 'equipment_id',
                'value' => $model->equipment->equipment_name,
                'label' => 'Līnijas Iekārta'
            ],
            [
                'attribute' => 'production_line_id',
                'value' => $model->unitType->name,
                'label' => 'Mezgla tips'
            ],
            'unit_function:ntext',
            'unit_service_interval',
            'unit_installation_date',
            'unit_last_maintenance',
        ],
    ]) ?>

</div>
