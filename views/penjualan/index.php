<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Penjualan;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PenjualanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penjualan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penjualan-index table-reponsive">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Penjualan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => 'No', 'headerOptions' => ['style' => 'text-align:center; width: 5%'], 'contentOptions' => ['style' => 'text-align:center;']],

            'nomor_nota',
            'tanggal',
            'pelanggan.nama_pelanggan',
            'total',
            // 'user_id',
            'user.username',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Penjualan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'nomor_nota' => $model->nomor_nota]);
                }
            ],
        ],
    ]); ?>


</div>