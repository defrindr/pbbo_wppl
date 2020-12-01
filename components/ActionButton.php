<?php
/**
 * Created by PhpStorm.
 * User: feb
 * Date: 30/05/16
 * Time: 00.14
 */

namespace app\components;

use app\models\Pelatihan;
use yii\helpers\Html;

class ActionButton
{
    public static function getButtons($btn_pengajuan_selanjutnya = false)
    {
        $btn = [
            'view' => function ($url, $model, $key) {
                return Html::a("<i class='fa fa-eye'></i>", ["view", "id"=>$model->id], ["class"=>"btn btn-success", "title"=>"Lihat Data"]);
            },
            'update' => function ($url, $model, $key) {
                return Html::a("<i class='fa fa-pencil'></i>", ["update", "id"=>$model->id], ["class"=>"btn btn-warning", "title"=>"Edit Data"]);
            },
            'delete' => function ($url, $model, $key) {
                return Html::a("<i class='fa fa-trash'></i>", ["delete", "id"=>$model->id], [
                    "class"=>"btn btn-danger",
                    "title"=>"Hapus Data",
                    "data-confirm" => "Apakah Anda yakin ingin menghapus data ini ?",
                    //"data-method" => "GET"
                ]);
            },
        ];
        $template = '{view} {update} {delete}';
        $width = "140px";

        if($btn_pengajuan_selanjutnya) {
            $template = "{ajukan} <br> $template";
            $btn["ajukan"] = function ($url, $model, $key) {
                if($model->status_id == Constant::STATUS_SELESAI && $model->tingkat_id != Constant::PELATIHAN_TINGKAT_LANJUT_2){
                    $check_exist = Pelatihan::findOne(['pelatihan_sebelumnya' => $model->id, 'flag' => 1]);
                    if($check_exist == []){
                        return Html::a("Tingkat Berikutnya", ["tingkat-lanjut", "id"=>$model->id], [
                            "class"=>"btn btn-primary",
                            'style' => 'margin-bottom: 5px',
                            "title"=>"Pengajuan Data",
                            "data-confirm" => "Apakah Anda yakin ingin mengajukan tingkat berikutnya ?",
                            //"data-method" => "GET"
                        ]);
                    }
                }
            };
            $width = "280px";
        }

        return [
            'class' => 'yii\grid\ActionColumn',
            'template' => $template,
            'buttons' => $btn,
            'contentOptions' => ['nowrap'=>'nowrap', 'style'=>"text-align:center;width:$width"]
        ];
    }
}