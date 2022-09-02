<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Penjualan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penjualan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomor_nota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <?php
    $dataPost = ArrayHelper::map(\app\models\Pelanggan::find()->asArray()->all(), 'pelanggan_id', 'nama_pelanggan');
    echo $form->field($model, 'pelanggan_id')
        ->dropDownList($dataPost, ['prompt' => 'Pilih Pelanggan']); ?>

    <?= $form->field($model, 'total')->textInput() ?>

    <?php $dataPost = ArrayHelper::map(\app\models\user::find()->asArray()->all(), 'user_id', 'username');
    echo $form->field($model, 'user_id')
        ->dropDownList($dataPost, ['prompt' => 'Pilih User']); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Batal', ['/penjualan-detail/index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>