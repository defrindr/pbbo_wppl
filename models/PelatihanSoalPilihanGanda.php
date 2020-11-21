<?php

namespace app\models;

use Yii;
use \app\models\base\PelatihanSoalPilihanGanda as BasePelatihanSoalPilihanGanda;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pelatihan_soal_pilihan_ganda".
 */
class PelatihanSoalPilihanGanda extends BasePelatihanSoalPilihanGanda
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
