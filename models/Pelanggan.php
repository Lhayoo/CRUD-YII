<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pelanggan".
 *
 * @property int $pelanggan_id
 * @property string $nama_pelanggan
 * @property string $alamat
 * @property string $no_hp
 *
 * @property Penjualan[] $penjualans
 */
class Pelanggan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelanggan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pelanggan', 'alamat', 'no_hp'], 'required'],
            [['alamat'], 'string'],
            [['nama_pelanggan'], 'string', 'max' => 100],
            [['no_hp'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pelanggan_id' => 'Pelanggan ID',
            'nama_pelanggan' => 'Nama Pelanggan',
            'alamat' => 'Alamat',
            'no_hp' => 'No Hp',
        ];
    }

    /**
     * Gets query for [[Penjualans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPenjualans()
    {
        return $this->hasMany(Penjualan::className(), ['pelanggan_id' => 'pelanggan_id']);
    }
}
