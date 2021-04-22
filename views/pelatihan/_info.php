<?php

use app\components\RoleType;
use app\models\PelatihanJenis;

/**
 * @var yii\web\View $this
 * @var app\models\Pelatihan $model
 */


$userLogin = Yii::$app->user->identity;
$formtemplate = [
    'template' => '
    <div class="col-lg-12">
        <div class="col-md-4"><label class="control-label">{labelTitle}</label></div>
        <div class="col-md-8">{input}</div>
        <div class="col-md-12">{error}</div>
    </div>
        ',
    'options' => ['class' => 'col-md-12', 'style' => 'padding:0px;']
];

?>

<div class="col-md-6">

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display: none']) ?>
    <?php
    $jenis = app\models\PelatihanJenis::find();

    $jenis = $jenis->select(["id", "concat(`index`,'  ', nama) as nama", "sasaran", "peserta", "durasi", "materi", "anggaran"])->asArray()->all();

    echo $form->field($model, 'jenis', $formtemplate)->dropDownList(
        \yii\helpers\ArrayHelper::map($jenis, 'id', 'nama'),
        [
            'prompt' => 'Select',
            'onChange' => 'gantiJenis()'
        ]
    );
    ?>
    <?php

    /*
    $materi = [];
    if (!$model->isNewRecord) {
        $jenisPelatihan = PelatihanJenis::findOne($model->jenis);
        foreach (explode(",", $jenisPelatihan->materi) as $m) {
            $materi[$m] = $m;
        }
    }
    echo $form->field($model, 'materi_pelatihan', $formtemplate)->dropDownList($materi);
    
    */
    ?>
    <?=
    $form->field($model, 'materi_pelatihan', $formtemplate)
        ->label("Materi")
        ->textarea(['maxlength' => true, "readonly" => true, 'rows' => 10])
    ?>
    <?= $form->field($model, 'sasaran', $formtemplate)->label("Sasaran Peserta")->textarea(['maxlength' => true, "readonly" => true, 'rows' => 5]) ?>
    <?= $form->field($model, 'jumlah_target', $formtemplate)->textInput(['type' => 'number', 'min' => 1]) ?>
    <?= $form->field($model, 'alokasi_dana', $formtemplate)->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'sumber_dana', $formtemplate)->textInput(['maxlength' => true]) ?>


    <?= $model->kriteria = "-"; //$form->field($model, 'kriteria', $formtemplate)->textInput() 
    ?>

</div>
<div class="col-md-6">

    <?= $form->field($model, 'nama', $formtemplate)->textInput(['maxlength' => true])->label("Nama Pelatihan") ?>
    <?= $form->field($model, 'latar_belakang', $formtemplate)->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'tujuan', $formtemplate)->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'sasaran_wilayah', $formtemplate)->textInput() ?>
    <?= $form->field($model, 'tanggal_mulai', $formtemplate)->widget(
        \kartik\date\DatePicker::class,
        [
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]
    ) ?>
    <?= $form->field($model, 'tanggal_selesai', $formtemplate)->widget(
        \kartik\date\DatePicker::class,
        [
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]
    ) ?>
    <?= $form->field($model, 'lokasi', $formtemplate)->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'kota', $formtemplate)->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'nama_penandatangan', $formtemplate)->textInput(['maxlength' => true, "placeholder" => "untuk sertifikat"]) ?>
    <?= $form->field($model, 'nip_penandatangan', $formtemplate)->textInput(['maxlength' => true, "placeholder" => "untuk sertifikat"]) ?>
    <?= $form->field($model, 'forum_diskusi', $formtemplate)->textInput(['maxlength' => true]) ?>

    <?php
    if ($userLogin->role_id == RoleType::SA) :
        echo $form->field($model, 'pelaksana_id', $formtemplate)->dropDownList(
            \yii\helpers\ArrayHelper::map(app\models\User::find()->where([
                '!=', 'role_id', 3 // role peserta
            ])->all(), 'id', 'name'),
            [
                'prompt' => 'Select',
                'disabled' => (isset($relAttributes) && isset($relAttributes['pelaksana_id'])),
            ]
        );
    endif;
    ?>
</div>

<?php
// $form->field($model, 'tingkat_id')->dropDownList(
//     \yii\helpers\ArrayHelper::map(app\models\PelatihanTingkat::find()->all(), 'id', 'nama'),
//     [
//         'prompt' => 'Select',
//         'disabled' => (isset($relAttributes) && isset($relAttributes['tingkat_id'])),
//     ]
// );
?>

<script>
    var jenisPelatihan = <?= json_encode($jenis) ?>;

    function gantiJenis() {

        var sasaran_spesifik = '<?= ($userLogin->sasaran_spesifik != "") ? $model->sasaran = $userLogin->sasaran_spesifik . ", " : "" ?>';

        const jenis = jenisPelatihan.find(j => j.id == $('#pelatihan-jenis').val());

        $('#pelatihan-sasaran').val(sasaran_spesifik + jenis.sasaran)
        if ($('#pelatihan-sasaran').val() == '') $('#pelatihan-sasaran').val("-")

        $('#pelatihan-jumlah_target').val(jenis.peserta.replace(/[^\d.]/g, ''))
        $('#pelatihan-alokasi_dana').val(jenis.anggaran.replace(/[^\d.]/g, ''))



        //if ($('#pelatihan-jumlah_target').val() == '') $('#pelatihan-jumlah_target').val("0")


        $("#pelatihan-materi_pelatihan").val(jenis.materi);

    }
</script>