<?php

namespace app\models;

use Yii;
use \app\models\base\KategoriSoal as BaseKategoriSoal;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "master_kategori_soal".
 */
class KategoriSoal extends BaseKategoriSoal
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
