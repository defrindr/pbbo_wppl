<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "pelatihan".
 *
 * @property integer $id
 * @property string $nama
 * @property string $latar_belakang
 * @property string $tujuan
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property integer $tingkat_id
 * @property integer $status_id
 * @property string $forum_diskusi
 * @property integer $pelaksana_id
 * @property string $modified_at
 * @property integer $modified_by
 * @property string $created_at
 * @property integer $created_by
 *
 * @property \app\models\PelatihanTingkat $tingkat
 * @property \app\models\User $pelaksana
 * @property \app\models\PelatihanStatus $status
 * @property \app\models\PelatihanLampiran[] $pelatihanLampirans
 * @property \app\models\PelatihanPeserta[] $pelatihanPesertas
 * @property \app\models\PelatihanSoalJenis[] $pelatihanSoalJenis
 * @property \app\models\PelatihanSoalPilihanGanda[] $pelatihanSoalPilihanGandas
 * @property string $aliasModel
 */
abstract class Pelatihan extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelatihan';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false,
            ],
            [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'latar_belakang', 'tujuan', 'tanggal_mulai', 'tingkat_id', 'pelaksana_id', 'modified_by'], 'required'],
            [['latar_belakang', 'tujuan', 'unique_id'], 'string'],
            [['tanggal_mulai', 'tanggal_selesai', 'modified_at'], 'safe'],
            [['tingkat_id', 'status_id', 'pelaksana_id', 'modified_by'], 'integer'],
            [['nama'], 'string', 'max' => 200],
            [['forum_diskusi'], 'string', 'max' => 100],
            [['tingkat_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\PelatihanTingkat::class, 'targetAttribute' => ['tingkat_id' => 'id']],
            [['pelaksana_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\User::class, 'targetAttribute' => ['pelaksana_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\PelatihanStatus::class, 'targetAttribute' => ['status_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unique_id' => 'Unique ID',
            'nama' => 'Nama',
            'latar_belakang' => 'Latar Belakang',
            'tujuan' => 'Tujuan',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'tingkat_id' => 'Tingkat    ',
            'status_id' => 'Status ID',
            'forum_diskusi' => 'Forum Diskusi',
            'pelaksana_id' => 'Pelaksana ID',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'nama' => 'nama pelatihan',
            'tingkat_id' => 'tingkat pelatihan',
            'forum_diskusi' => 'link forum diskusi , ex : link grup whatsapp, telegram, discord',
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTingkat()
    {
        return $this->hasOne(\app\models\PelatihanTingkat::class, ['id' => 'tingkat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelaksana()
    {
        return $this->hasOne(\app\models\User::class, ['id' => 'pelaksana_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(\app\models\PelatihanStatus::class, ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihanLampirans()
    {
        return $this->hasMany(\app\models\PelatihanLampiran::class, ['pelatihan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihanPesertas()
    {
        return $this->hasMany(\app\models\PelatihanPeserta::class, ['pelatihan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihanSoalJenis()
    {
        return $this->hasMany(\app\models\PelatihanSoalJenis::class, ['pelatihan_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihanSoalPilihanGandas()
    {
        return $this->hasMany(\app\models\PelatihanSoalPilihanGanda::class, ['pelatihan_soal_id' => 'id']);
    }




}
