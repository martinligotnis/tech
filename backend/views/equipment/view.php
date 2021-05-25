<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Equipment */

$this->title = $model->equipment_name;
$this->params['breadcrumbs'][] = ['label' => 'Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atjaunot datus', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Izdzēst', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Vai esat pārliecināts, ka vēlaties dzēst šo ierakstu?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'equipment_name',
            [
                'attribute' => 'production_line_id',
                'value' => $model->productionLine->name,
                'label' => 'Ražošanas līnija'
            ], 
        ],
    ]) ?>

</div>
