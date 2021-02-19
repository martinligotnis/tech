<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductionLine */

$this->title = 'Create Production Line';
$this->params['breadcrumbs'][] = ['label' => 'Production Lines', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-line-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
