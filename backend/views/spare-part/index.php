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

            'producer',
            'model',
            'description:ntext',
            [
                'attribute' => 'unit_type_id',
                'value' => 'unit_type.name',
                'label' => 'Detaļas tips'
            ],
            [
                'attribute' => 'unit_id',
                'value' => 'unit.name',
                'label' => 'Mezgls'
            ],
            //'unit_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
