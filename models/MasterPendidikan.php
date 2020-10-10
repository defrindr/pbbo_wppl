<?php

namespace app\models;

use Yii;
use \app\models\base\MasterPendidikan as BaseMasterPendidikan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "master_pendidikan".
 */
class MasterPendidikan extends BaseMasterPendidikan
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
