<?php

use app\components\mazer\Tabs;
use dmstr\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\models\PelatihanPeserta $model
 */

$this->title = "Peserta {$model->pelatihan->nama}: " . $model->nama;
$this->params['breadcrumbs'][] = ['label' => "Peserta {$model->pelatihan->nama}", 'url' => \yii\helpers\Url::to(["/pelatihan/{$model->pelatihan_id}"])];
$this->params['breadcrumbs'][] = ['label' => (string) $model->nik, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud pelatihan-peserta-view">
    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('Kembali', ["/pelatihan/view", 'id' => $model->pelatihan_id], ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <div class="card card-default">
        <div class="card-body">
            <?php $this->beginBlock('app\models\PelatihanPeserta'); ?>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'id',
                    [
                        'format' => 'html',
                        'attribute' => 'pelatihan_id',
                        'value' => $model->pelatihan->nama,
                    ],
                    'nik',
                    'nama',
                    'email:email',
                    'no_telp',
                    'tanggal_lahir',
                    'tempat_lahir',
                    [
                        'format' => 'html',
                        'attribute' => 'jenis_kelamin_id',
                        'value' => $model->jenisKelamin->nama,
                    ],
                    [
                        'format' => 'html',
                        'attribute' => 'pendidikan_id',
                        'value' => $model->pendidikan->nama,
                    ],
                    [
                        'format' => 'html',
                        'attribute' => 'pekerjaan_id',
                        'value' => $model->pekerjaan->nama,
                    ],
                    'rt',
                    'rw',
                    'alamat:ntext',
                    // 'password',
                    // 'peserta_konfirmasi',
                    // 'nilai_pretest',
                    // 'nilai_posttest',
                    // 'nilai_praktek',
                    // 'komentar:ntext',
                    // 'kesibukan_pasca_pelatihan',
                    // 'nama_usaha',
                    // 'jenis_usaha',
                    // 'lokasi:ntext',
                    // 'jenis_izin_usaha:ntext',
                    // 'nib:ntext',
                    // 'masa_berlaku',
                    // 'lanjut',
                ],
            ]); ?>

            <hr />

            <?= Html::a(
                '<span class="glyphicon glyphicon-trash"></span> ' . 'Delete',
                ['delete', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
                    'data-method' => 'post',
                ]
            ); ?>
            <?php $this->endBlock(); ?>


            <?php $this->beginBlock('PelatihanPesertIkuts'); ?>
            <?php Pjax::begin(['id' => 'pjax-PelatihanSoalPesertaikuts', 'enableReplaceState' => false, 'linkSelector' => '#pjax-PelatihanSoalPesertaIkuts ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
            <?= '<div class="table-responsive">'
                . \yii\grid\GridView::widget([
                    'layout' => '{summary}{pager}<br/>{items}{pager}',
                    'dataProvider' => new \yii\data\ActiveDataProvider([
                        'query' => $model->getPesertaIkut(),
                        'pagination' => [
                            'pageSize' => 20,
                            'pageParam' => 'page-pelatihansoalpesertaikuts',
                        ],
                    ]),
                    'pager' => [
                        'class' => app\components\mazer\LinkPager::className(),
                        'firstPageLabel' => 'First',
                        'lastPageLabel' => 'Last',
                    ],
                    'columns' => [
                        'nama',
                        // 'latar_belakang:ntext',
                        // 'tujuan:ntext',
                        'tanggal_mulai',
                        [
                            'class' => yii\grid\DataColumn::className(),
                            'attribute' => 'tingkat_id',
                            'value' => function ($model) {
                                if ($rel = $model->tingkat) {
                                    return $rel->nama;
                                } else {
                                    return '';
                                }
                            },
                            'format' => 'raw',
                        ],
                        [
                            'class' => yii\grid\DataColumn::className(),
                            'attribute' => 'pelaksana_id',
                            'value' => function ($model) {
                                if ($rel = $model->pelaksana) {
                                    return $rel->name;
                                } else {
                                    return '';
                                }
                            },
                            'format' => 'raw',
                        ],
                        'materi_pelatihan',
                        /*'tanggal_selesai'*/
                        /*'modified_at'*/
                        [
                            'class' => yii\grid\DataColumn::class,
                            'attribute' => 'sasaran_wilayah',
                            'header' => "wilayah"
                        ],
                    ],
                ])
                . '</div>' ?>
            <?php Pjax::end() ?>
            <?php $this->endBlock() ?>



            <?= Tabs::widget([
                'id' => 'relation-tabs',
                'encodeLabels' => false,
                'items' => [
                    [
                        'label' => '<b class=""># ' . $model->nik . '</b>',
                        'content' => $this->blocks['app\models\PelatihanPeserta'],
                        'active' => true,
                    ],
                    [
                        'content' => $this->blocks['PelatihanPesertIkuts'],
                        'label' => '<small>Pelatihan yang Pernah Diikuti <span class="badge badge-default">' . $model->getPesertaIkut()->count() . '</span></small>',
                        'active' => false,
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
</div>