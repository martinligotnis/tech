<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SparePartSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Spare Parts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spare-part-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Spare Part', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'producer',
            'model',
            'description:ntext',
            'unit_type_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
