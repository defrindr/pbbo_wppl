<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\search\PelatihanSoalJenisSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="pelatihan-soal-jenis-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'jenis_id') ?>

		<?= $form->field($model, 'pelatihan_id') ?>

		<?= $form->field($model, 'waktu_pengerjaan') ?>

		<?= $form->field($model, 'jumlah_soal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
