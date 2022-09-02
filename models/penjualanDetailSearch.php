<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\penjualanDetail;

/**
 * penjualanDetailSearch represents the model behind the search form of `app\models\penjualanDetail`.
 */
class penjualanDetailSearch extends penjualanDetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['penjualan_detail_id', 'barang_id'], 'integer'],
            [['nomor_nota', 'nama_barang'], 'safe'],
            [['harga', 'jumlah', 'subtotal'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = penjualanDetail::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'penjualan_detail_id' => $this->penjualan_detail_id,
            'barang.nama_barang' => $this->barang_id,
            'barang_id' => $this->barang_id,
            'harga' => $this->harga,
            'jumlah' => $this->jumlah,
            'subtotal' => $this->subtotal,
        ]);

        $query->andFilterWhere(['like', 'nomor_nota', $this->nomor_nota]);

        return $dataProvider;
    }
}
