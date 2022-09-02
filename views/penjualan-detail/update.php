<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\penjualanDetail */

$this->title = 'Update Penjualan Detail: ' . $model->penjualan_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Penjualan Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->penjualan_detail_id, 'url' => ['view', 'penjualan_detail_id' => $model->penjualan_detail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penjualan-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
