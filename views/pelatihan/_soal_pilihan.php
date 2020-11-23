<?php
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap\ActiveForm;

$hiddenTemplate = ["template" => "{input}"];
$hiddenStyle = ["style" => "display: none"];

DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper_soal_pilihan', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.soal-pilihan-items', // required: css class selector
    'widgetItem' => '.item-soal-pilihan', // required: css class
    'limit' => 999, // the maximum times, an element can be cloned (default 999)
    'min' => 1, // 0 or 1 (default 1)
    'insertButton' => '.add-item-pilihan', // css class
    'deleteButton' => '.remove-item-pilihan', // css class
    'model' => $modelSoalPilihan[0],
    'formId' => 'Pelatihan',
    'formFields' => [
        'id',
        "pilihan",
    ],
]);
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h6>
            Daftar Pilihan (Kosongi jika tipe soal tidak membutuhkan pilihan)

            <div class="pull-right">
                <button type="button" class="add-item-pilihan btn btn-success btn-xs"><i
                    class="glyphicon glyphicon-plus"></i> Add</button>
            </div>
        </h6>
    </div>
    <div class="panel-body">
        <div class="container-items soal-pilihan-items">
            <!-- widgetBody -->

            <?php foreach ($modelSoalPilihan as $i => $o): ?>
            <div class="item item-soal-pilihan">
                <h6>
                    <div class="pull-right">
                        <button type="button" class="remove-item-pilihan btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                    </div>
                </h6>
                <?=$form->field($o, "[{$indexSoal}][{$i}]pilihan")->textInput()?>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div><!-- .panel -->

<?php DynamicFormWidget::end()?>