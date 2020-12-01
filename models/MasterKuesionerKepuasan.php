<?php

namespace app\models;

use Yii;
use \app\models\base\MasterKuesionerKepuasan as BaseMasterKuesionerKepuasan;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "master_kuesioner_kepuasan".
 */
class MasterKuesionerKepuasan extends BaseMasterKuesionerKepuasan
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
