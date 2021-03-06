<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "wilayah_provinsi".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property \app\models\WilayahKabupaten[] $wilayahKabupatens
 * @property string $aliasModel
 */
abstract class WilayahProvinsi extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wilayah_provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['nama'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWilayahKabupatens()
    {
        return $this->hasMany(\app\models\WilayahKabupaten::className(), ['provinsi_id' => 'id']);
    }




}
