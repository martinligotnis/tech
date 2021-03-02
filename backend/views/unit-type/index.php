<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UnitTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mezgla tips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Pievienot mezgla tipu', ['create'], ['class' => 'btn btn-success']) ?>
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
