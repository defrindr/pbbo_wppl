<?php

use app\components\Constant;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\PelatihanSearch $searchModel
 */

$this->title = "Koreksi Jawaban {$peserta->nama} pada pelatihan {$model->nama} ( {$soal_jenis->jenis->nama} )";
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
    <?= Html::a('Kembali', ['view', 'id' => $model->id], ['class' => 'btn btn-default'])?>
</p>


    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']])?>

    <div class="box box-info">
        <div class="box-body">
            <?php $form = ActiveForm::begin([
                'action' => Url::to(["/pelatihan/posttest/koreksi-jawaban/$peserta->id/$model->unique_id"]), 
                'layout' => 'horizontal',
                'enableClientValidation' => true,
                'errorSummaryCssClass' => 'error-summary alert alert-error']);?>
            <!-- <div class="table-responsive"> -->
                <?= Html::input('hidden', 'id', $peserta->id)?>
                <?= Html::input('hidden', 'unique_id', $model->unique_id)?>
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
                        // [
                        //     'label' => 'Kategori Soal',
                        //     'value' => function($model){
                        //         return $model->soal->jenis->jenis->nama;
                        //     }
                        // ],
                        [
                            'label' => 'Type Soal',
                            'value' => function($model){
                                return $model->soal->kategoriSoal->nama;
                            }
                        ],
                        // [
                        //     'attribute' => 'peserta_id',
                        //     'value' => function($model){
                        //         return $model->peserta->peserta->nama;
                        //     }
                        // ],
                        [
                            'attribute' => 'soal_id',
                            'value' => function($model){
                                return $model->soal->soal;
                            }
                        ],
                        'jawaban',
                        [
                            'label' => 'Nilai',
                            'format' => 'raw',
                            'value' => function($model) use($form){
                                $model->nilai_max = $model->soal->nilai_maksimum;
                                if(in_array($model->soal->kategoriSoal->id, [Constant::SOAL_TYPE_ESSAY, Constant::SOAL_TYPE_JAWABAN_SINGKAT])) return $form->field($model,"[{$model->id}]nilai",[
                                    'template' => '{input}<br>{error}'
                                ])->textInput(['type' => 'number', 'max' => $model->soal->nilai_maksimum, 'min' => 0, 'style' => 'max-width: 80%;margin-left: 10%;min-width:50px', 'placeholder' => 'Max: '.$model->soal->nilai_maksimum]);
                                else return 'Nilai Dari Pilihan Ganda <br>Akan Dihitung oleh Sistem';
                            }
                        ]
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
            <?php ActiveForm::end()?>
            <!-- </div> -->
            
        </div>
    </div>

    <?php \yii\widgets\Pjax::end()?>

