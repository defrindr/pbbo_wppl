<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\PelatihanJenisSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="pelatihan-jenis-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'index') ?>

		<?= $form->field($model, 'nama') ?>

		<?= $form->field($model, 'sasaran') ?>

		<?= $form->field($model, 'peserta') ?>

		<?php // echo $form->field($model, 'durasi') ?>

		<?php // echo $form->field($model, 'instansi_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
