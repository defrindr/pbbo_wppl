<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "pelatihan_soal_peserta".
 *
 * @property integer $id
 * @property integer $peserta_id
 * @property integer $jenis_soal
 * @property string $waktu_mulai
 * @property string $waktu_selesai
 *
 * @property \app\models\PelatihanPeserta $peserta
 * @property \app\models\PelatihanSoalJenis $jenisSoal
 * @property string $aliasModel
 */
abstract class PelatihanSoalPeserta extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelatihan_soal_peserta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['peserta_id', 'jenis_soal', 'waktu_mulai', 'waktu_selesai'], 'required'],
            [['peserta_id', 'jenis_soal'], 'integer'],
            [['waktu_mulai', 'waktu_selesai'], 'safe'],
            [['peserta_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\PelatihanPeserta::className(), 'targetAttribute' => ['peserta_id' => 'id']],
            [['jenis_soal'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\PelatihanSoalJenis::className(), 'targetAttribute' => ['jenis_soal' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'peserta_id' => 'Peserta',
            'jenis_soal' => 'Jenis Soal',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_selesai' => 'Waktu Selesai',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeserta()
    {
        return $this->hasOne(\app\models\PelatihanPeserta::className(), ['id' => 'peserta_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisSoal()
    {
        return $this->hasOne(\app\models\PelatihanSoalJenis::className(), ['id' => 'jenis_soal']);
    }




}
