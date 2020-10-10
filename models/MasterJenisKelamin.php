<?php

namespace app\models;

use Yii;
use \app\models\base\MasterJenisKelamin as BaseMasterJenisKelamin;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "master_jenis_kelamin".
 */
class MasterJenisKelamin extends BaseMasterJenisKelamin
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
