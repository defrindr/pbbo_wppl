<?php

namespace app\models;

use Yii;
use \app\models\base\MasterJenisSoal as BaseMasterJenisSoal;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "master_jenis_soal".
 */
class MasterJenisSoal extends BaseMasterJenisSoal
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
