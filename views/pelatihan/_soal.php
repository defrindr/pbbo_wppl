<?php 
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;


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
        // 'pelatihan_id',
        "jenis_id",
        "kategori_soal_id",
        "nomor",
        "soal",
        "pilihan",
        "jawaban",
        // "jumlah_soal"
    ],
]);
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h4>
            <i class="glyphicon glyphicon-book"></i> Daftar Soal
        </h4>
    </div>
    <div class="panel-body">
        <div>
            <!-- widgetBody -->

            <?php foreach ($modelSoal as $i => $o): ?>
            <div class="item panel">
                <!-- widgetItem -->
                <table class="table table-responsive table-hover">
                    <thead>
                        <!-- <th> Tipe Soal </th> -->
                        <th> Soal </th>
                        <th> Pilihan </th>
                        <th> Jawaban </th>
                        <th>
                            <button type="button" class="add-item btn btn-success btn-xs"><i
                                class="glyphicon glyphicon-plus"></i></button>
                        </th>
                    </thead>
                    <tbody class="container-items soal-items">
                        <tr class="item item-soal">
                            <td>
                                <?=$form->field($o, "[{$i}]kategori_soal_id", $hiddenTemplate)->dropdownList(
                                \yii\helpers\ArrayHelper::map(app\models\MasterKategoriSoal::find()->all(), 'id', 'nama'),
                                [
                                    'prompt' => 'Select',
                                ])?>
                                <?= $form->field($o, "[{$i}]soal", $hiddenTemplate)->TextArea() ?>
                            </td>
                            <td>
                            <?=
                                $this->render('_soal_pilihan.php', [
                                    'modelSoal' => $o,
                                    'indexSoal' => $i,
                                    'modelSoalPilihan' => $modelSoalPilihan[$i],
                                    'form' => $form
                                ]) ?>
                            </td>
                            <td>
                                <?= $form->field($o, "[{$i}]jawaban", $hiddenTemplate)->textInput(['placeholder' => "Kosongi jika tipe soal bukan multiple choices"]) ?>
                            </td>
                            <td>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i
                                    class="glyphicon glyphicon-minus"></i></button>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div><!-- .panel -->

<?php DynamicFormWidget::end() ?>