<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
/**
 * @var yii\web\View $this
 * @var app\models\Pelatihan $model
 */

$this->title = 'Soal ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pelatihan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>

<p>
    <?=Html::a('<i class="fa fa-eye-open"></i> Kembali', ['view', 'id' => $model->id], ['class' => 'btn btn-default'])?>
</p>
<style>
    .form-group {
        margin: 0!important;
    }
</style>
<div class="box box-info">
    <div class="box-body">
        <?php $form = ActiveForm::begin([
            'id' => 'Pelatihan',
            // 'layout' => 'horizontal',
            'type' => ActiveForm::TYPE_HORIZONTAL,
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error',
        ]);
        ?>

        <?php
        $wizard_config = [
            'id' => 'stepwizard',
            'steps' => [
                1 => [
                    'title' => 'Jenis Soal',
                    'icon' => 'glyphicon glyphicon-book',
                    'content' => $this->render('_soal_jenis.php',[
                        'modelSoalJenis' => $modelSoalJenis,
                        'model' => $model,
                        'form' => $form,
                    ]),
                    'buttons' => [
                        'next' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'disabled',
                            ],
                        ],
                    ],
                ],
                2 => [
                    'title' => 'Soal',
                    'icon' => 'glyphicon glyphicon-book',
                    'content' => $this->render('_soal.php',[
                        'modelSoal' => $modelSoal, 
                        'modelSoalPilihan' => $modelSoalPilihan, 
                        'model' => $model,
                        'form' => $form,
                    ]),
                    'buttons' => [
                        'next' => [
                            'title' => 'Forward',
                            'options' => [
                                'class' => 'disabled',
                            ],
                        ],
                    ],
                ],
            ],
            'complete_content' => $this->render('_action.php'), // Optional final screen
            'start_step' => 2, // Optional, start with a specific step
        ];
        ?>

        <?=\drsdre\wizardwidget\WizardWidget::widget($wizard_config);?>
            <hr/>
            <?php echo $form->errorSummary($model); ?>

        <?php ActiveForm::end();?>

    </div>
</div>