<?php

use kartik\file\FileInput;
use yii\helpers\Html;

$colomn_2 = [
    'template' => '
    <div class="col-lg-12">
        <div class="col-md-4"><label class="control-label">{labelTitle}</label></div>
        <div class="col-md-8">{input}</div>
        <div class="col-md-12">{error}</div>
    </div>
        ',
    'options' => ['class' => 'col-md-6', 'style' => 'padding:0px;'],
];
$hiddenTemplate = ["template" => "{input}"];
$hiddenStyle = ["style" => "display: none"];

?>


<div class="card card-default">
    <div class="card-header">
        <h4>
            <i class="glyphicon glyphicon-book"></i> Upload List Peserta
            <div class="pull-right">
                <?= Html::a('Download Template', ['download-template-peserta'], ['class' => 'btn btn-sm btn-primary']) ?>
            </div>
        </h4>
    </div>
    <div class="card-body">
        <div class="container-items peserta-items">
            <?= $form->field($model, "file")->widget(FileInput::class, [
                'options' => [
                    'accept' => "application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
                ],
                'pluginOptions' => [
                    'allowedFileExtensions' => ['xlsx', 'xls'],
                    'maxFileSize' => 4000,
                    'showPreview' => false,
                    'showCaption' => true,
                    'showRemove' => true,
                    'showUpload' => false,
                ],
            ]) ?>
        </div>
    </div>
</div><!-- .panel -->