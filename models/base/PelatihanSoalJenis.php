<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "pelatihan_soal_jenis".
 *
 * @property integer $id
 * @property integer $jenis_id
 * @property integer $pelatihan_id
 * @property integer $waktu_pengerjaan
 * @property integer $jumlah_soal
 *
 * @property \app\models\PelatihanSoal[] $pelatihanSoals
 * @property \app\models\MasterJenisSoal $jenis
 * @property \app\models\Pelatihan $pelatihan
 * @property string $aliasModel
 */
abstract class PelatihanSoalJenis extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelatihan_soal_jenis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_id', 'pelatihan_id'], 'required'],
            [['jenis_id', 'pelatihan_id', 'waktu_pengerjaan', 'jumlah_soal'], 'integer'],
            [['waktu_pengerjaan'], 'integer', 'min' => 5], // minimal waktu pengerjaan adalah 5 menit
            [['jenis_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\MasterJenisSoal::class, 'targetAttribute' => ['jenis_id' => 'id']],
            [['pelatihan_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Pelatihan::class, 'targetAttribute' => ['pelatihan_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_id' => 'Jenis',
            'pelatihan_id' => 'Pelatihan',
            'waktu_pengerjaan' => 'Waktu Pengerjaan',
            'jumlah_soal' => 'Jumlah Soal',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'jenis_id' => 'jenis soal pelatihan',
            'pelatihan_id' => 'pelatihan yang diadakan',
            'waktu_pengerjaan' => 'waktu pengerjaan , dalam satuan menit',
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihanSoals()
    {
        return $this->hasMany(\app\models\PelatihanSoal::class, ['jenis_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenis()
    {
        return $this->hasOne(\app\models\MasterJenisSoal::class, ['id' => 'jenis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihan()
    {
        return $this->hasOne(\app\models\Pelatihan::class, ['id' => 'pelatihan_id']);
    }




}
