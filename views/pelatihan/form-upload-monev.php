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
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error',
        ]);
        ?>
			<?=$form->field($model, 'id', ["template" => "{input}"])->hiddenInput()?>
			<?=$form->field($model, 'hasil_pelaksanaan_pelatihan')->textarea()?>
			<?=$form->field($model, 'sertifikat')->fileInput()?>
			<?=$form->field($model, 'rekapitulasi_nilai')->fileInput()?>
			<?=$form->field($model, 'absensi_kehadiran')->fileInput()?>
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