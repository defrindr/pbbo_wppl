<?php

namespace app\models;

use Yii;
use \app\models\base\WilayahProvinsi as BaseWilayahProvinsi;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "wilayah_provinsi".
 */
class WilayahProvinsi extends BaseWilayahProvinsi
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

    public function dropdown(){
        $output = "";

        $data = WilayahProvinsi::all();

        if(count($data) > 0) foreach($data as $row) $output = "<option value='{$row->id}'>{$row->nama}</option>";
        else $output = "<option>-</option>";

        return $output;
    }
}
