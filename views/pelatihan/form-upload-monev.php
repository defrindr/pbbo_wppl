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

<div class="card card-default">
    <div class="card-body">
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
			<?=$form->field($model, 'proposal')->fileInput(($model->proposal) ? [] : ['required' =>  true]) ?>
            <?php if($model->proposal): ?>
                <div class="form-group">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <?= Html::a("Lampiran Proposal", ["{$model->proposal}"]) ?>
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