<?php

namespace app\models;

use Yii;
use \app\models\base\PelatihanPeserta as BasePelatihanPeserta;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pelatihan_peserta".
 */
class PelatihanPeserta extends BasePelatihanPeserta
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

    public function getPesertaIkut(){
        $list_pelatihan = PelatihanPeserta::find()->where(['nik' => $this->nik])->join('inner join', 'pelatihan', 'pelatihan.id = pelatihan_peserta.pelatihan_id')->select('pelatihan.id')->asArray()->all();
        $list = [];

        foreach($list_pelatihan as $i) array_push($list, $i['id']);
        $model = Pelatihan::find()->where(['in', 'id', $list]);
        return $model;
    }
}
