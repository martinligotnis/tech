<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SparePartPicturesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Spare Part Pictures';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spare-part-pictures-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Spare Part Pictures', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'spare_part_id',
            'url:url',
            'picture_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
