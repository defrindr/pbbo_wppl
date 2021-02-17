<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "PelatihanJenisController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PelatihanJenisController extends \yii\rest\ActiveController
{
public $modelClass = '\app\models\PelatihanJenis';
}
