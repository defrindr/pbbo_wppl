<?php

namespace app\models;

use Yii;
use \app\models\base\PelatihanSoalJenis as BasePelatihanSoalJenis;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pelatihan_soal_jenis".
 */
class PelatihanSoalJenis extends BasePelatihanSoalJenis
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
