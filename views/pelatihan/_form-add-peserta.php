<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Pelatihan $model
 */

$this->title = 'Peserta ' . $model->nama . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Pelatihan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>

<p>
    <?=Html::a('<i class="fa fa-eye-open"></i> Lihat', ['view', 'id' => $model->id], ['class' => 'btn btn-default'])?>
</p>

<div class="card card-default">
    <div class="card-body">
        <?php $form = ActiveForm::begin([
    'id' => 'Pelatihan',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error',
]);
?>

        <?php
$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Berkas Peserta',
            'icon' => 'glyphicon glyphicon-book',
            'content' => $this->render('_peserta.php', ['modelPeserta' => $modelPeserta, 'form' => $form]),
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
            'title' => 'Excel List Peserta',
            'icon' => 'glyphicon glyphicon-book',
            'content' => $this->render('_peserta_upload_excel.php', ['model' => $modelExcel, 'form' => $form]),
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
    'start_step' => 1, // Optional, start with a specific step
];
?>

        <?=\drsdre\wizardwidget\WizardWidget::widget($wizard_config);?>
            <hr/>
            <?php echo $form->errorSummary($model); ?>

        <?php ActiveForm::end();?>

    </div>
</div>