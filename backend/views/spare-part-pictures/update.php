<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SparePartPictures */

$this->title = 'Update Spare Part Pictures: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Spare Part Pictures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="spare-part-pictures-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
