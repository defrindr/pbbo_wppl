<?php

use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\PelatihanPesertaSearch $searchModel
 */

$this->title = 'Update Nilai Praktek';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']])?>

    <div class="box box-info">
        <div class="box-body">
            <div class="table-responsive">
            <?php $form = ActiveForm::begin([
                'action' => Url::to(['/pelatihan/update-nilai-praktek', 'id' => $model->id]), 
                'layout' => 'horizontal',
                'enableClientValidation' => true,
                'errorSummaryCssClass' => 'error-summary alert alert-error']);?>
            <?= Html::input('hidden', 'id', $model->id)?>
                <?=GridView::widget([
                    'layout' => '{summary}{pager}{items}{pager}',
                    'dataProvider' => $dataProvider,
                    'pager' => [
                        'class' => yii\widgets\LinkPager::className(),
                        'firstPageLabel' => 'First',
                        'lastPageLabel' => 'Last'],
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                    'headerRowOptions' => ['class' => 'x'],
                    'columns' => [
                        [
                            'attribute'=>'nilai_praktek',
                            'label'=>'Nilai Praktek',
                            'value' => function($model) use($form) {
                                return $form->field($model,"[{$model->id}]nilai_praktek",[
                                    'template' => '{input}'
                                ])->textInput(['type' => 'number', 'max' => 100, 'min' => 0, 'style' => 'width: 80%;margin-left: 10%', 'placeholder' => 'Max: 100']);
                            },
                            'format' => 'raw',
                        ],
                        'nik',
                        'nama',
                        'email:email',
                        'no_telp',
                        'tanggal_lahir',
                        'tempat_lahir',
                    ],
                ]);?>
            <?= Html::submitButton('Send', [
                'class' => 'btn btn-info',
                "title"=>"Kirim Data",
                "data-confirm" => "Apakah Anda yakin data ini sudah benar ?",
            ]); ?>
            <?= Html::a('kembali',['pelatihan/view', 'id' => $model->id ], [
                'class' => 'btn btn-default'
            ]); ?>
            <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>

    <?php \yii\widgets\Pjax::end()?>

