<?php
namespace app\components;

class RoleType {
    const SA = 1;
    const PEMATERI = 4;


    public static function disallow($model){
        $user = \Yii::$app->user->identity;
        if(!($user->role_id == RoleType::SA || $model->pelaksana_id == $user->id)) return 1;
        return 0;
    }
}