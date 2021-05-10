<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SparePart */

$this->title = 'Izveidot Mezgla daļu';
$this->params['breadcrumbs'][] = ['label' => 'Rezerves daļas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spare-part-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
