<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\penjualanDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penjualan-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'penjualan_detail_id') ?>

    <?= $form->field($model, 'nomor_nota') ?>

    <?= $form->field($model, 'barang_id') ?>

    <?= $form->field($model, 'harga') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?php // echo $form->field($model, 'subtotal') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>