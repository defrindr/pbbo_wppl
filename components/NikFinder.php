<?php
/**
 * Created by PhpStorm.
 * User: feb
 * Date: 22/02/16
 * Time: 14.16
 */

namespace app\components;


use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

class NikFinder extends Widget
{
    public $model;
    public $otherModel;
    public $attribute;
    public $inputID;
    public $buttonID;
    public $modelName;
    public $registerJs = true;
    public $filterDesa = "0";//0 false
    public $no_kk = null;

    public $pilihan = [];
    public $options = [];

    public function run()
    {
        $model = $this->model;
        $attr = $this->attribute;

        $this->inputID = uniqid();
        $this->buttonID = uniqid();


        if($this->otherModel == null){
            $reflect = new \ReflectionClass($this->model->className());
            $this->modelName = strtolower($reflect->getShortName());
        }else{
            $model = $this->model = $this->otherModel;
            $reflect = new \ReflectionClass($this->otherModel->className());
            $this->modelName = strtolower($reflect->getShortName());
        }

        $jsPengisian = "";
        $jsPengisianArray = [];
        foreach ($this->pilihan as $value) {
            if (strpos($value, 'hidden') !== false) {
                $variableIsian = str_replace("_hidden", "", $value);
            }else{
                $variableIsian = $value;
            }
            $otherAttr  = $this->attribute;
            $otherAttr = str_replace('[','',$otherAttr);
            $otherAttr = str_replace(']','-',$otherAttr);
            $w =
                '
                    $.when(
                        $("#'. $this->modelName .'-'.$otherAttr.'_' . $value .'").val(result.'.$variableIsian.').change().triggerHandler("change")

                    ).done(
                        function(){
                            console.log("'. $this->modelName .'-'.$otherAttr.'_' . $value .'");
                            console.log(result.'.$variableIsian.');
                            nextaction
                        }
                    );
                '
            ;
            array_push($jsPengisianArray,$w);

        }

        foreach ($jsPengisianArray as $tochange){
            if($jsPengisian == "") $jsPengisian = $tochange;
            else{
                $jsPengisian = str_replace("nextaction", $tochange, $jsPengisian);
            }
        }
        $jsPengisian = str_replace("nextaction", "", $jsPengisian);

        $schema = [
            "class" => "form-control input-nik  " . $this->inputID,
            "style"=>"width:90%;display:inline-block",
            "btnId"=>$this->buttonID,
            "placeholder"=>"NIK Peserta",
        ];
        if($this->registerJs)
            $this->registerJs($jsPengisian);
        
        if($options['id'])  $schema["id"] = $this->options['id'];

        return
            Html::activeTextInput($model,$this->attribute,
                $schema
            ) ." ".
            Html::a("<i class=\"fa fa-search\"></i>", "javascript:void(0)",
                [
                    "id"=>$this->buttonID,
                    "btnId"=>$this->buttonID,
                    "model"=>$this->modelName,
                    "attribute"=>$this->attribute,
                    "timestamp"=>"",
                    "pilihan"=>implode(',' ,$this->pilihan),
                    "class"=>"btn btn-info btn-searc-nik",
                    "style"=>"position: absolute;margin-left: 10px;",
                    "onclick"=>"nikSearch(this)"
                ]
            );
    }

    public function registerJs(){
        $this->getView()->registerJs('


function nikSearch(btn){


    var url = "'.Url::to(["/api/pelatihan/find-peserta-by-nik"]).'";
    console.log("input[btnId=" + $(btn).attr("btnId") + "]");
    var data = {
        nik : $("input[btnId=" + $(btn).attr("btnId") + "]").val(),
    }
    var input = $(btn).attr("pilihan").split(",");
    var model = $(btn).attr("model");
    var attribute = $(btn).attr("attribute");

    jQuery.ajax( {
        url: url,
        data: data,
        type: "GET",
        dataType: "json",
        success: function(result) {
            if (result.message == "data-found" ){

            input.forEach(function(entry, index) {
                var entryjs = entry.replace("_hidden", "");

                attribute = attribute.replace("[", "");
                attribute = attribute.replace("]", "-");
                attribute = attribute.replace("nik","");

                if($("#"  + model + "-" +  attribute + entryjs).length !=1){
                    //UNTUK DYNAMIC FORM
                    //alert("tidak ada");
                    $(".input_attribute").each(function(i, obj){
                        var marker = $(obj).attr("marker");
                        if(marker.indexOf($(btn).attr("timestamp")) > 0){
                            if(marker.indexOf(entry) > 0){
                                $(obj).val(result[entryjs]).trigger("change");
                            }
                        }
                    });

                }else{
                    // console.log(model + "-" +  attribute + entryjs + "=>" + entryjs);
                    $("#"  + model + "-" +  attribute + entryjs).val(result[entryjs]).trigger("change");
                }


            });

            }else{
                alert("NIK peserta ini belum pernah mengikuti pelatihan sama sekali sebelumnya");

            }
        },
        error: function(){

        },
    } );
}

        ', \yii\web\View::POS_END);
    }
}