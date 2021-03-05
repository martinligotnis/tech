<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Equipment */

$this->title = 'Update Equipment: ' . $model->equipment_name;
$this->params['breadcrumbs'][] = ['label' => 'Equipments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->equipment_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="equipment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
