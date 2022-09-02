<?php

namespace app\controllers;

use app\models\penjualanDetail;
use app\models\penjualanDetailSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PenjualanDetailController implements the CRUD actions for penjualanDetail model.
 */
class PenjualanDetailController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all penjualanDetail models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new penjualanDetailSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single penjualanDetail model.
     * @param int $penjualan_detail_id Penjualan Detail ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($penjualan_detail_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($penjualan_detail_id),
        ]);
    }

    /**
     * Creates a new penjualanDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new penjualanDetail();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'penjualan_detail_id' => $model->penjualan_detail_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing penjualanDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $penjualan_detail_id Penjualan Detail ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($penjualan_detail_id)
    {
        $model = $this->findModel($penjualan_detail_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'penjualan_detail_id' => $model->penjualan_detail_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing penjualanDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $penjualan_detail_id Penjualan Detail ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($penjualan_detail_id)
    {
        $this->findModel($penjualan_detail_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the penjualanDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $penjualan_detail_id Penjualan Detail ID
     * @return penjualanDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($penjualan_detail_id)
    {
        if (($model = penjualanDetail::findOne(['penjualan_detail_id' => $penjualan_detail_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
