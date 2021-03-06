<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\search\PelatihanSoalSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="pelatihan-soal-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'jenis_id') ?>

		<?= $form->field($model, 'kategori_soal_id') ?>

		<?php // $form->field($model, 'nomor') ?>

		<?= $form->field($model, 'soal') ?>

		<?php // echo $form->field($model, 'pilihan') ?>

		<?php // echo $form->field($model, 'jawaban') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
