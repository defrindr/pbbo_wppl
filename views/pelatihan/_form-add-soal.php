<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Pelatihan $model
 */

$this->title = 'Soal ' . $model->nama . ', ' . 'Edit';
$this->params['breadcrumbs'][] = ['label' => 'Pelatihan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>

<p>
    <?=Html::a('<i class="fa fa-eye-open"></i> Lihat', ['view', 'id' => $model->id], ['class' => 'btn btn-default'])?>
</p>

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
                    'title' => 'Jenis Soal',
                    'icon' => 'glyphicon glyphicon-book',
                    'content' => $this->render('_soal_jenis.php',[
                        'modelSoalJenis' => $modelSoalJenis,
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
            'start_step' => 1, // Optional, start with a specific step
        ];
        ?>

        <?=\drsdre\wizardwidget\WizardWidget::widget($wizard_config);?>
            <hr/>
            <?php echo $form->errorSummary($model); ?>

        <?php ActiveForm::end();?>

    </div>
</div>