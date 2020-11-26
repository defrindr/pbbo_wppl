<?php

use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\PelatihanPesertaSearch $searchModel
 */

$this->title = 'Daftar Peserta Hadir';
$this->params['breadcrumbs'][] = $this->title;
?>

    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']])?>

    <div class="box box-info">
        <div class="box-body">
            <div class="table-responsive">
            <?=Html::beginForm(['/pelatihan/update-kehadiran', 'id' => $model->id], 'post');?>
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
                            'class' => 'yii\grid\CheckboxColumn',
                            'checkboxOptions' => function ($model) {
                                return [
                                    'value' => $model->id,
                                    'checked' => ($model->kehadiran == 1) ? true : false
                                ];
                            },
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
            <?= Html::endForm() ?>
            </div>
        </div>
    </div>

    <?php \yii\widgets\Pjax::end()?>

