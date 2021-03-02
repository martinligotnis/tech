<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductionLineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ražošanas līnijas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-line-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Izveidot jaunu līniju', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'name',
                'label' => 'Nosaukums'
            ], 

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
