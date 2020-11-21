<?php

namespace app\models;

use Yii;
use \app\models\base\PelatihanSoal as BasePelatihanSoal;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pelatihan_soal".
 */
class PelatihanSoal extends BasePelatihanSoal
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
