<?php

namespace app\models;

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
}
