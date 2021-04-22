<?php

namespace app\models;

use Yii;
use \app\models\base\Instansi as BaseInstansi;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "instansi".
 */
class Instansi extends BaseInstansi
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
