<?php

namespace app\models;

use Yii;
use \app\models\base\Pendidikan as BasePendidikan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "master_pendidikan".
 */
class Pendidikan extends BasePendidikan
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
