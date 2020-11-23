<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "PelatihanPesertaController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PelatihanPesertaController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\PelatihanPeserta';
}
