<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var app\models\search\PelatihanSearch $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="pelatihan-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'nama') ?>

		<?= $form->field($model, 'latar_belakang') ?>

		<?= $form->field($model, 'tujuan') ?>

		<?= $form->field($model, 'tanggal_mulai') ?>

		<?php // echo $form->field($model, 'tanggal_selesai') ?>

		<?php // echo $form->field($model, 'tingkat_id') ?>

		<?php // echo $form->field($model, 'status_id') ?>

		<?php // echo $form->field($model, 'forum_diskusi') ?>

		<?php // echo $form->field($model, 'pelaksana_id') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'created_by') ?>

		<?php // echo $form->field($model, 'modified_at') ?>

		<?php // echo $form->field($model, 'modified_by') ?>

		<?php // echo $form->field($model, 'flag') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
