<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */

$this->title = 'Update Penjualan: ' . $model->nomor_nota;
$this->params['breadcrumbs'][] = ['label' => 'Penjualan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nomor_nota, 'url' => ['view', 'nomor_nota' => $model->nomor_nota]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penjualan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>