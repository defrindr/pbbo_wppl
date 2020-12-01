<?php

namespace app\models;

use Yii;
use \app\models\base\PelatihanKuesionerMonev as BasePelatihanKuesionerMonev;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pelatihan_kuesioner_monev".
 */
class PelatihanKuesionerMonev extends BasePelatihanKuesionerMonev
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
