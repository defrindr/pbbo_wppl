<?php

namespace app\controllers\api;

/**
 * This is the class for REST controller "PelatihanController".
 */

use app\models\PelatihanPeserta;

class PelatihanController extends \yii\rest\ActiveController
{
    public $modelClass = 'app\models\Pelatihan';

    public function actionFindPesertaByNik()
    {
        if (\Yii::$app->user) {
            return PelatihanPeserta::searchByNIK($_GET['nik']);
        }
    }
}
