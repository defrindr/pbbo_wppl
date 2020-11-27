<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\PelatihanLampiran $model
 * @var yii\widgets\ActiveForm $form
 */

$this->title = 'Ajukan Detail Monev';
$this->params['breadcrumbs'][] = ['label' => 'Pelatihan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-info">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'id' => 'PelatihanLampiran',
            'layout' => 'horizontal',
            // "options" => ['enctype' => "multipart/form-data"],
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error',
        ]);
        ?>
			<?php //$form->field($model, 'id', ["template" => "{input}"])->hiddenInput()?>
            <?=$form->field($model, 'hasil_pelaksanaan_pelatihan')->textarea(['required' => true])?>
            <?=$form->field($model, 'dasar_pelaksanaan')->textarea(['required' => true])?>
			<?=$form->field($model, 'sertifikat')->fileInput(($model->sertifikat) ? [] : ['required' =>  true])?>
            <?php if($model->sertifikat): ?>
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <?= Html::a("Lampiran Template Sertifikat", ["{$model->sertifikat}"]) ?>
                    </div>
                </div>
            <?php endif ?>
			<?=$form->field($model, 'rekapitulasi_nilai')->fileInput(($model->rekapitulasi_nilai) ? [] : ['required' =>  true])?>
            <?php if($model->rekapitulasi_nilai): ?>
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <?= Html::a("Lampiran Rekapitulasi Nilai", ["{$model->rekapitulasi_nilai}"]) ?>
                    </div>
                </div>
            <?php endif ?>
			<?=$form->field($model, 'absensi_kehadiran')->fileInput(($model->absensi_kehadiran) ? [] : ['required' =>  true])?>
            <?php if($model->absensi_kehadiran): ?>
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <?= Html::a("Lampiran Absensi Kehadiran", ["{$model->absensi_kehadiran}"]) ?>
                    </div>
                </div>
            <?php endif ?>
            <hr/>
        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-offset-3 col-md-10">
                <?=Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success']);?>
                <?=Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default'])?>
            </div>
        </div>

        <?php ActiveForm::end();?>

    </div>
</div>