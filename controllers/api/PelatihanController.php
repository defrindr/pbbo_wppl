<?php

namespace app\controllers\api;

/**
* This is the class for REST controller "PelatihanController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PelatihanController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Pelatihan';
}
