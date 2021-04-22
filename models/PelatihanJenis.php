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

    public $selectedInstansi = [];

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            []
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['selectedInstansi', 'each', 'rule' => ['integer']],
            ]
        );
    }
}
