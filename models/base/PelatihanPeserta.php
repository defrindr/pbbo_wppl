<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\models\base;

use Yii;

/**
 * This is the base-model class for table "pelatihan_peserta".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $pelatihan_id
 * @property string $nik
 * @property string $nama
 * @property string $email
 * @property string $no_telp
 * @property string $tanggal_lahir
 * @property string $tempat_lahir
 * @property integer $jenis_kelamin_id
 * @property integer $pendidikan_id
 * @property integer $pekerjaan_id
 * @property integer $rt
 * @property integer $rw
 * @property string $alamat
 * @property integer $desa_id
 * @property integer $kehadiran
 * @property integer $nilai_pretest
 * @property integer $nilai_posttest
 * @property integer $nilai_praktek
 * @property string $komentar
 * @property integer $kesibukan_pasca_pelatihan
 * @property string $nama_usaha
 * @property string $jenis_usaha
 * @property string $lokasi
 * @property string $jenis_izin_usaha
 * @property string $nib
 * @property integer $masa_berlaku
 * @property integer $lanjut
 *
 * @property \app\models\WilayahDesa $desa
 * @property \app\models\MasterJenisKelamin $jenisKelamin
 * @property \app\models\MasterPekerjaan $pekerjaan
 * @property \app\models\Pelatihan $pelatihan
 * @property \app\models\PelatihanKuesionerKepuasan[] $pelatihanKuesionerKepuasans
 * @property \app\models\PelatihanKuesionerMonev[] $pelatihanKuesionerMonevs
 * @property \app\models\PelatihanKuisionerKepuasan[] $pelatihanKuisionerKepuasans
 * @property \app\models\PelatihanKuisionerMonev[] $pelatihanKuisionerMonevs
 * @property \app\models\PelatihanSoalPeserta[] $pelatihanSoalPesertas
 * @property \app\models\MasterPendidikan $pendidikan
 * @property \app\models\User $user
 * @property string $aliasModel
 */
abstract class PelatihanPeserta extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelatihan_peserta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'pelatihan_id', 'jenis_kelamin_id', 'pendidikan_id', 'pekerjaan_id', 'rt', 'rw', 'desa_id', 'kehadiran', 'nilai_pretest', 'nilai_posttest', 'nilai_praktek', 'kesibukan_pasca_pelatihan', 'masa_berlaku', 'lanjut'], 'integer'],
            [['pelatihan_id', 'nik', 'nama', 'email', 'no_telp', 'tanggal_lahir', 'tempat_lahir', 'jenis_kelamin_id', 'pendidikan_id', 'pekerjaan_id', 'rt', 'rw', 'alamat'], 'required'],
            [['alamat', 'komentar', 'lokasi', 'jenis_izin_usaha', 'nib'], 'string'],
            [['nik'], 'string', 'max' => 20],
            [['nama', 'email', 'no_telp', 'tanggal_lahir', 'tempat_lahir', 'nama_usaha', 'jenis_usaha'], 'string', 'max' => 100],
            [['desa_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\WilayahDesa::className(), 'targetAttribute' => ['desa_id' => 'id']],
            [['jenis_kelamin_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\MasterJenisKelamin::className(), 'targetAttribute' => ['jenis_kelamin_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['pelatihan_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\Pelatihan::className(), 'targetAttribute' => ['pelatihan_id' => 'id']],
            [['pendidikan_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\MasterPendidikan::className(), 'targetAttribute' => ['pendidikan_id' => 'id']],
            [['pekerjaan_id'], 'exist', 'skipOnError' => true, 'targetClass' => \app\models\MasterPekerjaan::className(), 'targetAttribute' => ['pekerjaan_id' => 'id']]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'pelatihan_id' => 'Pelatihan ID',
            'nik' => 'Nik',
            'nama' => 'Nama',
            'email' => 'Email',
            'no_telp' => 'No Telp',
            'tanggal_lahir' => 'Tanggal Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'jenis_kelamin_id' => 'Jenis Kelamin ID',
            'pendidikan_id' => 'Pendidikan ID',
            'pekerjaan_id' => 'Pekerjaan ID',
            'rt' => 'Rt',
            'rw' => 'Rw',
            'alamat' => 'Alamat',
            'desa_id' => 'Desa ID',
            'kehadiran' => 'Kehadiran',
            'nilai_pretest' => 'Nilai Pretest',
            'nilai_posttest' => 'Nilai Posttest',
            'nilai_praktek' => 'Nilai Praktek',
            'komentar' => 'Komentar',
            'kesibukan_pasca_pelatihan' => 'Kesibukan Pasca Pelatihan',
            'nama_usaha' => 'Nama Usaha',
            'jenis_usaha' => 'Jenis Usaha',
            'lokasi' => 'Lokasi',
            'jenis_izin_usaha' => 'Jenis Izin Usaha',
            'nib' => 'Nib',
            'masa_berlaku' => 'Masa Berlaku',
            'lanjut' => 'Lanjut',
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return array_merge(parent::attributeHints(), [
            'pelatihan_id' => 'pelatihan yang sedang diikuti',
            'kehadiran' => 'konfirmasi peserta jika 1 maka ikut, jika 0 maka mengundurkan diri atau tidak mengkonfirmasi kesiapan mengikutipelatihan',
            'nilai_pretest' => 'nilai max 100',
            'nilai_posttest' => 'nilai max 100',
            'nilai_praktek' => 'nilai max 100, diinput pemateri',
            'komentar' => 'masukkan dari pemateri',
            'nama_usaha' => 'isi jika ada',
            'jenis_usaha' => 'isi jika ada',
            'lokasi' => 'isi jika ada',
            'jenis_izin_usaha' => 'isi jika ada',
            'nib' => 'isi jika ada',
            'masa_berlaku' => 'masa berlaku usaha dalam bulan, jika ada',
            'lanjut' => '0 = berhenti, 1 = lanjut ke pelatihan berikutnya',
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesa()
    {
        return $this->hasOne(\app\models\WilayahDesa::className(), ['id' => 'desa_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisKelamin()
    {
        return $this->hasOne(\app\models\MasterJenisKelamin::className(), ['id' => 'jenis_kelamin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPekerjaan()
    {
        return $this->hasOne(\app\models\MasterPekerjaan::className(), ['id' => 'pekerjaan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihan()
    {
        return $this->hasOne(\app\models\Pelatihan::className(), ['id' => 'pelatihan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihanKuesionerKepuasans()
    {
        return $this->hasMany(\app\models\PelatihanKuesionerKepuasan::className(), ['peserta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihanKuesionerMonevs()
    {
        return $this->hasMany(\app\models\PelatihanKuesionerMonev::className(), ['peserta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihanKuisionerKepuasans()
    {
        return $this->hasMany(\app\models\PelatihanKuisionerKepuasan::className(), ['peserta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihanKuisionerMonevs()
    {
        return $this->hasMany(\app\models\PelatihanKuisionerMonev::className(), ['peserta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelatihanSoalPesertas()
    {
        return $this->hasMany(\app\models\PelatihanSoalPeserta::className(), ['peserta_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPendidikan()
    {
        return $this->hasOne(\app\models\MasterPendidikan::className(), ['id' => 'pendidikan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }




}
