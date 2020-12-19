<?php
use wbraganca\dynamicform\DynamicFormWidget;

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


<table class="table table-hover">
    <tbody class="soal-pilihan-items">
        <?php foreach ($modelSoalPilihan as $i => $o): ?>
        <tr class="item item-soal-pilihan">
            <td>
                <?php
                $checked = ($modelSoal->jawaban == $o->pilihan) ? 'checked' : '';
                // Formatted addons (inputs)
                echo $form->field($o, "[{$indexSoal}][{$i}]pilihan", [
                    "template" => "<div class='col-md-12'>{input}</div>",
                    'addon' => [
                        'prepend' => [
                            'content' => "<input type=\"radio\" name=\"PelatihanSoal[{$indexSoal}][checked]\" value=\"$i\" $checked>"
                        ]
                    ]
                ]);
                ?>
                <?php //$form->field($o, "[{$indexSoal}][{$i}]pilihan", ["template" => "<div class='col-md-2'></div><div class='col-md-6'>{input}</div>"])->textInput()?>
            </td>
            <td>
                <div class="pull-right">
                    <button type="button" class="remove-item-pilihan btn btn-danger btn-xs"><i
                            class="glyphicon glyphicon-minus"></i></button>
                    <button type="button" class="add-item-pilihan btn btn-success btn-xs"><i
                            class="glyphicon glyphicon-plus"></i> Add</button>
                </div>

            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<?php 
$this->registerJs('

    $(".dynamicform_wrapper_soal_pilihan").on("afterInsert", function(e, item_pilihan) {
        let sub_elements = $(".soal-pilihan-items");
        sub_elements = $(sub_elements).find(".item-soal-pilihan");
        var sub_id = sub_elements.length-1;
        $(item_pilihan).find("input[type=\"radio\"]").attr("value", sub_id);
    });
    $(".dynamicform_wrapper_soal_pilihan").on("beforeDelete", function(e, item_pilihan) {
        if (! confirm("Are you sure you want to delete this item?")) {
            return true;
        }
    });
');
DynamicFormWidget::end()?>