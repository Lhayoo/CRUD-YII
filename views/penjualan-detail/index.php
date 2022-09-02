<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\PenjualanDetail;

/* @var $this yii\web\View */
/* @var $searchModel app\models\penjualanDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Penjualan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-detail-index table-responsive">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <a href="/toko/web/index.php?r=penjualan%2Fcreate" class="btn btn-primary">Create Penjualan </a>
        <?= Html::a('Create Penjualan Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => 'No', 'headerOptions' => ['style' => 'text-align:center; width: 5%'], 'contentOptions' => ['style' => 'text-align:center;']],

            // 'penjualan_detail_id',
            'nomor_nota',
            'barang.nama_barang',
            'harga:currency',
            'jumlah',
            'subtotal:currency',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, penjualanDetail $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'penjualan_detail_id' => $model->penjualan_detail_id]);
                }
            ],
        ],
    ]); ?>


</div>