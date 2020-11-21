<?php

namespace app\models\search\api;

/**
* This is the class for REST controller "PelatihanSoalJenisController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PelatihanSoalJenisController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\PelatihanSoalJenis';
    /**
    * @inheritdoc
    */
    public function behaviors()
    {
    return ArrayHelper::merge(
    parent::behaviors(),
    [
    'access' => [
    'class' => AccessControl::className(),
    'rules' => [
    [
    'allow' => true,
    'matchCallback' => function ($rule, $action) {return \Yii::$app->user->can($this->module->id . '_' . $this->id . '_' . $action->id, ['route' => true]);},
    ]
    ]
    ]
    ]
    );
    }
}
