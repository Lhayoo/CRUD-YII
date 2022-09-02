<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\barang;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BrangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Barang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-index table-responsive">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Barang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => 'No', 'headerOptions' => ['style' => 'text-align:center; width: 5%'], 'contentOptions' => ['style' => 'text-align:center;']],

            // 'barang_id',
            'nama_barang',
            'harga_satuan:currency',
            'stok',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Barang $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'barang_id' => $model->barang_id]);
                }
            ],
        ],
    ]); ?>


</div>