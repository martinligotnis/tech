<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Equipment */

$this->title = 'Izveidot iekārtu';
$this->params['breadcrumbs'][] = ['label' => 'Iekārtas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
