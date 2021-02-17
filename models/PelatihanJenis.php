<?php

namespace app\models;

use Yii;
use \app\models\base\PelatihanJenis as BasePelatihanJenis;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pelatihan_jenis".
 */
class PelatihanJenis extends BasePelatihanJenis
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
