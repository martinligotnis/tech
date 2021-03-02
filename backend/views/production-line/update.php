<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductionLine */

$this->title = 'Atjaunot ražošanas līniju: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Ražošanas līnijas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atjaunot';
?>
<div class="production-line-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
