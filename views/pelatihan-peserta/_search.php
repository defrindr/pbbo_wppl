<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\search\PelatihanPesertaSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="pelatihan-peserta-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'pelatihan_id') ?>

		<?= $form->field($model, 'nik') ?>

		<?= $form->field($model, 'nama') ?>

		<?= $form->field($model, 'email') ?>

		<?php // echo $form->field($model, 'no_telp') ?>

		<?php // echo $form->field($model, 'tanggal_lahir') ?>

		<?php // echo $form->field($model, 'tempat_lahir') ?>

		<?php // echo $form->field($model, 'jenis_kelamin_id') ?>

		<?php // echo $form->field($model, 'pendidikan_id') ?>

		<?php // echo $form->field($model, 'pekerjaan_id') ?>

		<?php // echo $form->field($model, 'rt') ?>

		<?php // echo $form->field($model, 'rw') ?>

		<?php // echo $form->field($model, 'alamat') ?>

		<?php // echo $form->field($model, 'desa_id') ?>

		<?php // echo $form->field($model, 'password') ?>

		<?php // echo $form->field($model, 'peserta_konfirmasi') ?>

		<?php // echo $form->field($model, 'nilai_pretest') ?>

		<?php // echo $form->field($model, 'nilai_posttest') ?>

		<?php // echo $form->field($model, 'nilai_praktek') ?>

		<?php // echo $form->field($model, 'komentar') ?>

		<?php // echo $form->field($model, 'kesibukan_pasca_pelatihan') ?>

		<?php // echo $form->field($model, 'nama_usaha') ?>

		<?php // echo $form->field($model, 'jenis_usaha') ?>

		<?php // echo $form->field($model, 'lokasi') ?>

		<?php // echo $form->field($model, 'jenis_izin_usaha') ?>

		<?php // echo $form->field($model, 'nib') ?>

		<?php // echo $form->field($model, 'masa_berlaku') ?>

		<?php // echo $form->field($model, 'lanjut') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
