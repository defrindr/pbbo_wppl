<?php

namespace app\models;

use Yii;
use \app\models\base\MasterPekerjaan as BaseMasterPekerjaan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "master_pekerjaan".
 */
class MasterPekerjaan extends BaseMasterPekerjaan
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
