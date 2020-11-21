<?php 
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;


$hiddenTemplate = ["template" => "{input}"];
$hiddenStyle = ["style" => "display: none"];


DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_wrapper_soal_jenis', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
    'widgetBody' => '.soal-jenis-items', // required: css class selector
    'widgetItem' => '.item-soal', // required: css class
    'limit' => 999, // the maximum times, an element can be cloned (default 999)
    'min' => 1, // 0 or 1 (default 1)
    'insertButton' => '.add-item', // css class
    'deleteButton' => '.remove-item', // css class
    'model' => $modelSoalJenis[0],
    'formId' => 'Pelatihan',
    'formFields' => [
        'id',
        // 'pelatihan_id',
        "jenis_id",
        "waktu_pengerjaan",
        // "jumlah_soal"
    ],
]);
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h4>
            <i class="glyphicon glyphicon-book"></i> Daftar Jenis Soal
            <button type="button" class="add-item btn btn-success btn-sm pull-right"><i
                    class="glyphicon glyphicon-plus"></i> Add</button>
        </h4>
    </div>
    <div class="panel-body">
        <div class="container-items soal-jenis-items">
            <!-- widgetBody -->

            <?php foreach ($modelSoalJenis as $i => $o): ?>
            <div class="item item-soal panel panel-default">
                <!-- widgetItem -->
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">Soal</h3>
                    <div class="pull-right">
                        <button type="button" class="remove-item btn btn-danger btn-xs"><i
                                class="glyphicon glyphicon-minus"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <hr>
                <div class="panel-body">
                    <?= $form->field($o, "[{$i}]jenis_id")->dropdownList(
                    \yii\helpers\ArrayHelper::map(app\models\MasterJenisSoal::find()->all(), 'id', 'nama'),
                        [
                            'prompt' => 'Select',
                            'disabled' => (isset($relAttributes) && isset($relAttributes['jenis_id'])),
                        ]) ?>
                    <?= $form->field($o, "[{$i}]waktu_pengerjaan")->textInput(['type' => 'number']) ?>
                    <?= $this->render('_soal.php', [
                        'model' => $model,
                        'modelSoal' => $modelSoal
                    ]) ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div><!-- .panel -->

<?php DynamicFormWidget::end() ?>