<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "wilayah_kabupaten".
 *
 * @property integer $id
 * @property integer $provinsi_id
 * @property string $nama
 *
 * @property \app\models\WilayahProvinsi $provinsi
 * @property \app\models\WilayahKecamatan[] $wilayahKecamatans
 * @property string $aliasModel
 */
abstract class WilayahKabupaten extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wilayah_kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinsi_id', 'nama'], 'required'],
            [['provinsi_id'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            [['provinsi_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\WilayahProvinsi::className(), 'targetAttribute' => ['provinsi_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provinsi_id' => 'Provinsi ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinsi()
    {
        return $this->hasOne(\app\models\WilayahProvinsi::className(), ['id' => 'provinsi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWilayahKecamatans()
    {
        return $this->hasMany(\app\models\WilayahKecamatan::className(), ['kabupaten_id' => 'id']);
    }




}
