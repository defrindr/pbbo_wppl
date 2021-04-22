<?php

namespace app\models;

use app\components\Constant;
use Yii;
use \app\models\base\PelatihanPeserta as BasePelatihanPeserta;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pelatihan_peserta".
 */
class PelatihanPeserta extends BasePelatihanPeserta
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }

    public function getPesertaIkut()
    {
        $list_pelatihan = PelatihanPeserta::find()->join('inner join', 'pelatihan', 'pelatihan.id = pelatihan_peserta.pelatihan_id')
            ->where([
                'nik' => $this->nik, 'pelatihan_peserta.kehadiran' => Constant::KEHADIRAN_HADIR
            ])
            ->select('pelatihan.id')
            ->asArray()->all();
        $list = [];

        foreach ($list_pelatihan as $i) array_push($list, $i['id']);
        $model = Pelatihan::find()->where(['in', 'id', $list]);
        return $model;
    }

    public static function searchByNIK($nik)
    {
        $model = PelatihanPeserta::findOne(['nik' => $nik]);

        if ($model) {
            $model = $model->toArray();
            unset($model['pelatihan_id']);
            unset($model['user_id']);
            unset($model['kehadiran']);
            unset($model['nilai_pretest']);
            unset($model['nilai_posttest']);
            unset($model['nilai_praktek']);
            unset($model['komentar']);
            unset($model['kesibukan_pasca_pelatihan']);
            unset($model['nama_usaha']);
            unset($model['jenis_usaha']);
            unset($model['lokasi']);
            unset($model['jenis_izin_usaha']);
            unset($model['nib']);
            unset($model['masa_berlaku']);
            unset($model['lanjut']);

            $model['message'] = "data-found";
        } else {
            $model['message'] = "data-not-found";
        }

        return $model;
    }
}
