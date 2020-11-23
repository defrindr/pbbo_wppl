<?php

use yii\bootstrap\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\Pelatihan $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="box box-info">
    <div class="box-body">
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
                    'title' => 'Info',
                    'icon' => 'glyphicon glyphicon-cloud-download',
                    'content' => $this->render('_info.php',['model' => $model, 'form' => $form]),
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
                    'title' => 'Berkas Lampiran',
                    'icon' => 'glyphicon glyphicon-book',
                    'content' => $this->render('_lampiran.php',['modelLampiran' => $modelLampiran, 'form' => $form]),
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