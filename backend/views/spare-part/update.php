<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SparePart */

$this->title = 'Atjaunot rezerves daļu: ' . $model->part_name;
$this->params['breadcrumbs'][] = ['label' => 'Rezerves daļas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->part_name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atjaunot';
?>
<div class="spare-part-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
