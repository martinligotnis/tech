<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Maintenance */

$this->title = 'Update Maintenance: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Maintenances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maintenance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
