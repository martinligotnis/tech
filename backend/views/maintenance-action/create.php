<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaintenanceAction */

$this->title = 'Create Maintenance Action';
$this->params['breadcrumbs'][] = ['label' => 'Maintenance Actions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintenance-action-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
