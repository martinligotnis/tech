<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SparePart */

$this->title = $model->part_name;
$this->params['breadcrumbs'][] = ['label' => 'Rezerves daļas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="spare-part-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Labot', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Izdzēst', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Vai esat pārliecināts, ka vēlaties dzēst šo daļu?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'part_name',
            'producer',
            'model',
            'count',
            'description:ntext',
            'production_line_id',
            'equipment_id',
            'unit_id',
            'unit_type_id',
            'in_stock',
            'min_stock_quantity',
            'final_amount',
        ],
    ]) ?>

</div>
