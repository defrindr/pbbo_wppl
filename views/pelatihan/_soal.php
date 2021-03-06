<?php
use wbraganca\dynamicform\DynamicFormWidget;
use yii\bootstrap\ActiveForm;

$hiddenTemplate = ["template" => "{input}"];
$hiddenStyle = ["style" => "display: none"];

DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper_soal', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.soal-items', // required: css class selector
    'widgetItem' => '.item-soal', // required: css class
    'limit' => 999, // the maximum times, an element can be cloned (default 999)
    'min' => 1, // 0 or 1 (default 1)
    'insertButton' => '.add-item', // css class
    'deleteButton' => '.remove-item', // css class
    'model' => $modelSoal[0],
    'formId' => 'Pelatihan',
    'formFields' => [
        'id',
        "jenis_id",
        "kategori_soal_id",
        "soal",
        "pilihan",
        "jawaban",
    ],
]);
?>

<div class="item panel table-responsive ">
    <!-- widgetItem -->
    <table class="table table-hover">
        <thead>
            <!-- <th> Tipe Soal </th> -->
            <th> Soal </th>
            <th> Pilihan (Kosongi jika tipe soal tidak membutuhkan pilihan) </th>
            <!-- <th> Jawaban </th> -->
            <!-- <th> Nilai Maksimum </th> -->
            <th>
                <button type="button" class="add-item btn btn-success btn-xs"><i
                        class="glyphicon glyphicon-plus"></i></button>
            </th>
        </thead>
        <tbody class="container-items soal-items">
            <?php foreach ($modelSoal as $i => $o): ?>
            <tr class="item-soal">
                <td>
                    <?php 
                    // $form->field($o, "[{$i}]kategori_soal_id", $hiddenTemplate)->dropdownList(
                    //     \yii\helpers\ArrayHelper::map(app\models\MasterKategoriSoal::find()->all(), 'id', 'nama'),
                    //     [
                    //         'prompt' => 'Select',
                    //     ])?>
                    <?=$form->field($o, "[{$i}]soal", $hiddenTemplate)->TextArea(['style' => 'min-width: 30vw'])?>
                </td>
                <td>
                    <?=
                    $this->render('_soal_pilihan.php', [
                        'modelSoal' => $o,
                        'indexSoal' => $i,
                        'modelSoalPilihan' => $modelSoalPilihan[$i],
                        'form' => $form,
                    ])?>
                </td>
                <td>
                    <?php //$form->field($o, "[{$i}]jawaban", $hiddenTemplate)->textInput(['placeholder' => "Kosongi jika tipe soal bukan multiple choices"])?>
                </td>
                <!-- <td>
                    <?php //$form->field($o, "[{$i}]nilai_maksimum", $hiddenTemplate)->textInput(['placeholder' => "Nilai Maksimum"])?>
                </td> -->
                <td>
                    <button type="button" class="add-item btn btn-success btn-xs"><i
                        class="glyphicon glyphicon-plus"></i></button>
                    <button type="button" class="remove-item btn btn-danger btn-xs"><i
                        class="glyphicon glyphicon-minus"></i></button>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<?php 
$this->registerJs('

    $(".dynamicform_wrapper_soal").on("afterInsert", function(e, item_pilihan) {
        let elements = $(".soal-pilihan-items");
        var id = elements.length-1;
        var prepare_attr = "PelatihanSoal["+id+"][checked]";
        $(item_pilihan).find("input[type=\"radio\"]").attr("name", prepare_attr);

        
        $(".dynamicform_wrapper_soal_pilihan").on("afterInsert", function(e, item_pilihan) {
            let sub_elements = $(".soal-pilihan-items")[id];
            sub_elements = $(sub_elements).find(".item-soal-pilihan");
            var sub_id = sub_elements.length-1;
            if(id != null){
                var prepare_attr = "PelatihanSoal["+id+"][checked]";
                $(item_pilihan).find("input[type=\"radio\"]").attr("name", prepare_attr);
            }
            $(item_pilihan).find("input[type=\"radio\"]").attr("value", sub_id);
        });
    });

    $(".dynamicform_wrapper_soal").on("beforeDelete", function(e, item_orang) {
        if (! confirm("Are you sure you want to delete this item?")) {
            return true;
        }
    });
');
DynamicFormWidget::end()?>