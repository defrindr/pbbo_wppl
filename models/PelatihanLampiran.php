<?php

namespace app\models;

use Yii;
use \app\models\base\PelatihanLampiran as BasePelatihanLampiran;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pelatihan_lampiran".
 */
class PelatihanLampiran extends BasePelatihanLampiran
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


    public function getUploadedFolder(){
        $pathFolder = Yii::getAlias("@webroot/uploads/berkas_lampiran/") ;
        !file_exists($pathFolder)? mkdir($pathFolder, 0777, true) :false;
        return $pathFolder;
    }

    public function getUploadedUrlFolder(){
        $urlFolder = "uploads/berkas_lampiran/" ;
        return $urlFolder;
    }

}
