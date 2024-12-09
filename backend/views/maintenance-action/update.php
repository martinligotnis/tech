<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaintenanceAction */

$this->title = 'Update Maintenance Action: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Maintenance Actions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maintenance-action-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
