<?php

use app\models\Barang;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\helpers\Json;


/* @var $this yii\web\View */
/* @var $model app\models\penjualanDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penjualan-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomor_nota')->textInput(['maxlength' => true]) ?>

    <?php $dataPost = ArrayHelper::map(\app\models\Barang::find()->asArray()->all(), 'barang_id', 'nama_barang');
    echo $form->field($model, 'barang_id')
        ->dropDownList($dataPost, ['prompt' => 'Pilih Barang']); ?>

    <?php Pjax::begin(['id' => 'pjax-harga']) ?>
    <?php
    $barang_id = isset($_COOKIE['barang_id']) ? $_COOKIE['barang_id'] : '';
    $harga_satuan = '0  ';

    if ($barang_id != '') {
        $x = Barang::findOne($barang_id);
        $harga_satuan = $x->harga_satuan;
    }


    ?>
    <?= $form->field($model, 'harga')->textInput(['value' => $harga_satuan, 'readonly' => true]) ?>
    <?php Pjax::end() ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?php Pjax::begin(['id' => 'pjax-subtotal']) ?>
    <?php
    $jumlah = '';
    $subtotal = '0';

    if ($jumlah == '') {
        $jumlah = isset($_COOKIE['jumlah']) ? $_COOKIE['jumlah'] : '';
    }
    if ($jumlah != '' && $harga_satuan != '') {
        $subtotal = $jumlah * $harga_satuan;
    }
    if ($jumlah != '') {
        setcookie('jumlah', '');
        setcookie('barang_id', '');
    }
    ?>

    <?= $form->field($model, 'subtotal')->textInput(['value' =>  $subtotal, 'readonly' => true]) ?>
    <?php
    // setcookie('jumlah', '');
    // setcookie('barang_id', '');
    ?>
    <?php Pjax::end() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Batal', ['/penjualan-detail/index'], ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
<?php
$js = <<< JS
        $("#penjualandetail-barang_id").change(function(){
            document.cookie = "barang_id="+this.value+";SameSite=Lax";
            console.log(this.value);
            $.pjax.reload({container: "#pjax-harga", async:true});  
        })
        $("#penjualandetail-jumlah").change(function(){
            document.cookie = "jumlah="+this.value+";SameSite=Lax";
            console.log(this.value);
            $.pjax.reload({container: "#pjax-subtotal", async:true});
        })
        
    JS;
$this->registerJs($js);
?>