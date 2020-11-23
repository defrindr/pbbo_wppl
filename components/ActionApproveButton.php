<?php
/**
 * Created by PhpStorm.
 * User: feb
 * Date: 30/05/16
 * Time: 00.14
 */

namespace app\components;


use yii\helpers\Html;

class ActionApproveButton
{
    public static function getButtons()
    {
        return [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{aprrove}',
            'buttons' => [

              'approve' => function ($url, $model, $key) {
                  return Html::a("<i class='fa fa-trash'></i>", ["aprrove", "id"=>$model->id], [
                      "class"=>"btn btn-danger",
                      "title"=>"Approve",
                      "data-confirm" => "Apakah Anda yakin ingin menyetujui data ini ?",
                  ]);
              },

            ],
            'contentOptions' => ['nowrap'=>'nowrap', 'style'=>'text-align:center;width:140px']
        ];
    }
}
