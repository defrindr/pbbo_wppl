<?php

namespace app\models;

use Yii;
use \app\models\base\PelatihanTingkat as BasePelatihanTingkat;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pelatihan_tingkat".
 */
class PelatihanTingkat extends BasePelatihanTingkat
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
