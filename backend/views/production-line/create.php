<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ProductionLine */

$this->title = 'Izveidot ražošanas līniju';
$this->params['breadcrumbs'][] = ['label' => 'Ražošanas līnijas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-line-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
