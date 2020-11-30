<?php
use kartik\file\FileInput;
use yii\web\VIEW;
use yii\helpers\Html;
use yii\helpers\Url;
use wbraganca\dynamicform\DynamicFormWidget;

$hiddenTemplate = ["template" => "{input}"];
$hiddenStyle = ["style" => "display: none"];

// var_dump($modelLampiran[0]);die();

DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.container-items', // required: css class selector
    'widgetItem' => '.item', // required: css class
    'limit' => 999, // the maximum times, an element can be cloned (default 999)
    'min' => 1, // 0 or 1 (default 1)
    'insertButton' => '.add-item', // css class
    'deleteButton' => '.remove-item', // css class
    'model' => $modelLampiran[0],
    'formId' => 'Pelatihan',
    'formFields' => [
        'id',
        // 'pelatihan_id',
        'judul_lampiran',
        'image',
    ],
]);
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h4>
            <i class="glyphicon glyphicon-book"></i> Berkas Lampiran
            <button type="button" class="add-item btn btn-success btn-sm pull-right"><i
                    class="glyphicon glyphicon-plus"></i> Add</button>
        </h4>
    </div>
    <div class="panel-body">
        <div class="container-items">
            <!-- widgetBody -->

            <?php foreach ($modelLampiran as $i => $o): ?>
            <div class="item panel panel-default">
                <!-- widgetItem -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">Lampiran</h3>
                    <div class="pull-right">
                        <button type="button" class="remove-item btn btn-danger btn-xs"><i
                                class="glyphicon glyphicon-minus"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?=$form->field($o, "[{$i}]id", $hiddenTemplate)->textInput($hiddenStyle)?>
                    <?=$form->field($o, "[{$i}]pelatihan_id", $hiddenTemplate)->textInput($hiddenStyle) ?>
                    <?=$form->field($o, "[{$i}]judul_lampiran")->textInput(['maxlength' => true])?>
                    <?=$form->field($o, "[{$i}]image")->widget(FileInput::className(), [
                        'options' => [
                            'multiple' => false,
                            'accept' => 'application/msword,application/vnd.ms-excel'
                        ],
                        'pluginOptions' => [
                            'maxSize' => 3000,
                            'showPreview' => false,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false
                        ],
                    ])?>
                    <div class="col-md-6 col-md-offset-3">
                        <?php if($o->file != null): ?>
                            Berkas : <a target="_blank" href="<?= Url::base()."/{$o->getUploadedUrlFolder()}{$o->file}" ?>"><?= $o->judul_lampiran ?></a>
                        <?php endif; ?>
                    </div>
                    <hr>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div><!-- .panel -->
<?php
DynamicFormWidget::end();
?>