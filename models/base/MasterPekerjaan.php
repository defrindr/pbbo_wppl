<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "master_pekerjaan".
 *
 * @property integer $id
 * @property string $nama
 *
 * @property \app\models\PelatihanPeserta[] $pelatihanPesertas
 * @property \app\models\PelatihanPeserta[] $pelatihanPesertas0
 * @property string $aliasModel
 */
abstract class MasterPekerjaan extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_pekerjaan';
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
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'nama' => 'nama pekerjaan',
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihanPesertas()
    {
        return $this->hasMany(\app\models\PelatihanPeserta::className(), ['pekerjaan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihanPesertas0()
    {
        return $this->hasMany(\app\models\PelatihanPeserta::className(), ['pekerjaan_id' => 'id']);
    }




}
