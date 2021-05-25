<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Equipment */

$this->title = 'Atjaunot datus par iekārtu: ' . $model->equipment_name;
$this->params['breadcrumbs'][] = ['label' => 'Iekārtas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->equipment_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atjaunot datus';
?>
<div class="equipment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
