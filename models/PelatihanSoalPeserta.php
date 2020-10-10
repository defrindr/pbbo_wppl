<?php

namespace app\models;

use Yii;
use \app\models\base\PelatihanSoalPeserta as BasePelatihanSoalPeserta;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pelatihan_soal_peserta".
 */
class PelatihanSoalPeserta extends BasePelatihanSoalPeserta
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
}
