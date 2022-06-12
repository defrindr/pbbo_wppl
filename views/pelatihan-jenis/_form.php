<?php

use app\models\Instansi;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \app\components\mazer\Tabs;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/**
 * @var yii\web\View $this
 * @var app\models\PelatihanJenis $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="card card-default">
    <div class="card-body">
        <?php $form = ActiveForm::begin(
            [
                'id' => 'PelatihanJenis',
                'layout' => 'horizontal',
                'enableClientValidation' => true,
                'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
        );
        ?>

        <?= $form->field($model, 'index')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'sasaran')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'peserta')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'durasi')->textInput(['maxlength' => true]) ?>
        <?php
        $dataList = Instansi::find()->all();
        $data = ArrayHelper::map($dataList, 'id', 'nama');

        echo $form->field($model, 'selectedInstansi')->widget(Select2::class, [
            'data' => $data,
            'options' => ['multiple' => true, 'placeholder' => 'Instansi ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?>

        <hr />
        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-offset-3 col-md-10">
                <?= Html::submitButton('<i class="fa fa-save"></i> Simpan', ['class' => 'btn btn-success']); ?>
                <?= Html::a('<i class="fa fa-chevron-left"></i> Kembali', ['index'], ['class' => 'btn btn-default']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>