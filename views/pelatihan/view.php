<?php

use app\components\Constant;
use app\components\RoleType;
use app\components\Tanggal;
use app\models\PelatihanLampiran;
use app\components\mazer\Tabs;
use dmstr\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\models\Pelatihan $model
 */

$this->title = 'Pelatihan ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Pelatihan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud pelatihan-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?php if ($model->status_id < 4) : ?>
            <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?php endif ?>
        <?php if ($model->status_id < 4) : ?>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Tambah Peserta', ['add-peserta', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php endif ?>
        <?php if ($model->status_id < 4) : ?>
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Tambah Soal', ['add-soal', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . 'Daftar Pelatihan', ['index'], ['class' => 'btn btn-default']) ?>
    </p>
<?php endif ?>

<div class="clearfix"></div>

<!-- flash message -->
<?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
    <span class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <?= \Yii::$app->session->getFlash('deleteError') ?>
    </span>
<?php endif; ?>

<div class="box box-default">
    <div class="box-body">
        <?php $this->beginBlock('app\models\Pelatihan'); ?>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nama',
                'latar_belakang:ntext',
                'tujuan:ntext',
                [
                    'attribute' => 'tanggal_mulai',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Tanggal::toReadableDate($model->tanggal_mulai);
                    },
                ],
                [
                    'attribute' => 'tanggal_selesai',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Tanggal::toReadableDate($model->tanggal_selesai);
                    },
                ],
                [
                    'format' => 'html',
                    'attribute' => 'tingkat_id',
                    'value' => $model->tingkat->nama,
                ],
                [
                    'format' => 'html',
                    'attribute' => 'status_id',
                    'value' => $model->status->nama,
                ],
                [
                    'format' => 'html',
                    'attribute' => 'forum_diskusi',
                    'value' => "<a target='_blank' href='$model->forum_diskusi'>$model->forum_diskusi</a>",
                ],
                [
                    'format' => 'html',
                    'attribute' => 'pelaksana_id',
                    'value' => ($model->pelaksana ?
                        Html::a('<i class="glyphicon glyphicon-circle-arrow-right"></i> ' . $model->pelaksana->name, ['user/view', 'id' => $model->pelaksana->id])
                        :
                        '<span class="label label-warning">?</span>'),
                ],
                [
                    'attribute' => 'dasar_pelaksanaan',
                    'visible' => ($model->status_id >= 4),
                ],
                [
                    'attribute' => 'hasil_pelaksanaan_pelatihan',
                    'visible' => ($model->status_id >= 4),
                ],
                [
                    'attribute' => 'proposal',
                    'visible' => ($model->status_id >= 4),
                    'value' => function ($model) {
                        return "<a href='" . Yii::$app->request->baseUrl . "/" . $model->proposal . "'>Download Proposal</a>";
                    },
                    'format' => 'html',
                ],
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
        <?php
        if ($model->status_id == 1) {
            echo Html::a(
                '<span class="glyphicon glyphicon-arrow-up"></span> ' . 'Ajukan',
                ['ajukan', 'id' => $model->id],
                [
                    'class' => 'btn btn-primary',
                    'data-confirm' => '' . 'Yakin ingin mengajukan pelatihan ini ? anda tidak akan dapat mengubahnya setelah diajukan' . '',
                    'data-method' => 'post',
                ]
            );
        }
        if ($model->status_id == 2 && \app\components\RoleType::SA == \Yii::$app->user->identity->role_id) {
            echo Html::a(
                '<span class="glyphicon glyphicon-arrow-up"></span> ' . 'Setujui',
                ['setujui', 'id' => $model->id],
                [
                    'class' => 'btn btn-primary',
                    'data-confirm' => '' . 'Yakin ingin menyetujui pelatihan ini ? anda tidak akan dapat mengubahnya setelah diajukan' . '',
                    'data-method' => 'post',
                ]
            );
        }
        if (($model->status_id == 3 || $model->status_id == 4) && ($model->pelaksana_id == \Yii::$app->user->identity->id || \Yii::$app->user->identity->role_id == RoleType::SA)) {
            echo Html::a('<span class="glyphicon glyphicon-arrow-up"></span> ' . (($model->status_id == 3) ? 'Ajukan Monev' : "Ubah Data Monev"), ['ajukan-monev', 'id' => $model->id], ['class' => 'btn btn-primary']);
        }

        if ($model->status_id == 4 && \Yii::$app->user->identity->role_id == RoleType::SA) {
            echo Html::a('<span class="glyphicon glyphicon-arrow-up"></span> ' . 'Setujui Monev', ['setujui-monev', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'style' => "margin-left: 5px",
                'data-confirm' => '' . 'Yakin ingin menyetujui pelatihan ini ? anda tidak akan dapat mengubahnya setelah diajukan' . '',
                'data-method' => 'post',
            ]);
        }

        if ($model->status_id == 5) {
            echo Html::a('<span class="glyphicon glyphicon-arrow-up"></span> ' . 'Cetak Sertifikat', ['sertifikat', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'style' => "margin-left: 5px",
            ]);
        }

        if ($model->status_id == 5 && $model->tingkat_id < 4 && \Yii::$app->user->identity->role_id == $model->pelaksana_id) {
            echo Html::a('<span class="glyphicon glyphicon-arrow-up"></span> ' . 'Ajukan Pelatihan Ke Tingkat Selanjutnya', ['tingkat-selanjutnya', 'id' => $model->id], [
                'class' => 'btn btn-success',
                'style' => "margin-left: 5px",
                // 'data-confirm' => '' . 'Yakin ingin menyetujui pelatihan ini ? anda tidak akan dapat mengubahnya setelah diajukan' . '',
                // 'data-method' => 'post',
            ]);
        }
        ?>
        <?php $this->endBlock(); ?>



        <?php $this->beginBlock('PelatihanLampirans'); ?>
        <?php Pjax::begin(['id' => 'pjax-PelatihanLampirans', 'enableReplaceState' => false, 'linkSelector' => '#pjax-PelatihanLampirans ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
        <?= '<div class="table-responsive">'
            . \yii\grid\GridView::widget([
                'layout' => '{summary}{pager}<br/>{items}{pager}',
                'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => $model->getPelatihanLampirans(),
                    'pagination' => [
                        'pageSize' => 20,
                        'pageParam' => 'page-pelatihanlampirans',
                    ],
                ]),
                'pager' => [
                    'class' => app\components\mazer\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last',
                ],
                'columns' => [
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{download}',
                        'contentOptions' => ['nowrap' => 'nowrap'],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            // using the column name as key, not mapping to 'id' like the standard generator
                            $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                            $params[0] = 'pelatihan-lampiran' . '/' . $action;
                            $params['PelatihanLampiran'] = ['pelatihan_id' => $model->primaryKey()[0]];
                            return $params;
                        },
                        'buttons' => [
                            'download' => function ($model) {
                                $item = PelatihanLampiran::findOne(['id' => $model['id']]);
                                $url = \yii\helpers\Url::to(['/' . $item->getUploadedUrlFolder() . '/' . $item->file]);
                                return "<a href='{$url}'><i class='fa fa-download'></a>";
                            },
                        ],
                        'controller' => 'pelatihan-lampiran',
                    ],
                    // 'id',
                    'judul_lampiran',
                    // 'file',
                ],
            ])
            . '</div>' ?>
        <?php Pjax::end() ?>
        <?php $this->endBlock() ?>


        <?php $this->beginBlock('PelatihanPesertas'); ?>
        <?php if ($model->status_id == 3) : ?>
            <div style="padding :5px 0">
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'List Kehadiran', ['update-kehadiran', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'Tambah Nilai Praktek', ['update-nilai-praktek', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            </div>
        <?php endif ?>
        <?php Pjax::begin(['id' => 'pjax-PelatihanPesertas', 'enableReplaceState' => false, 'linkSelector' => '#pjax-PelatihanPesertas ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
        <?= '<div class="table-responsive">'
            . \yii\grid\GridView::widget([
                'layout' => '{summary}{pager}<br/>{items}{pager}',
                'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => $model->getPelatihanPesertas(),
                    'pagination' => [
                        'pageSize' => 99999,
                        'pageParam' => 'page-pelatihanpesertas',
                    ],
                ]),
                'pager' => [
                    'class' => app\components\mazer\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last',
                ],
                'columns' => [
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {koreksi-posttest}',
                        'contentOptions' => ['nowrap' => 'nowrap'],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                            $params[0] = 'pelatihan-peserta' . '/' . $action;
                            // $params['PelatihanPeserta'] = ['pelatihan_id' => $model->primaryKey()[0]];
                            return $params;
                        },
                        'buttons' => [
                            // 'koreksi-posttest' => function($modelPeserta) use ($model){
                            //     // if($model->status_id == 3){
                            //         // var_dump($model);
                            //         // die;
                            //         return "<a href='". Yii::$app->request->baseUrl ."/pelatihan/posttest/koreksi-jawaban/{$modelPeserta['id']}/{$model->unique_id}'><i class='fa fa-search'></i></a>";
                            //     // }
                            //     // return Html::a("<i class='fa fa-search'></i>", ["/pelatihan/posttest/koreksi-jawaban/{$model->id}/{$model->pelatihan->unique_id}"]);
                            // }
                        ],
                        'controller' => 'pelatihan-peserta',
                    ],
                    // 'id',
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'kehadiran',
                        'value' => function ($model) {
                            return ($model->kehadiran) ? "Hadir" : "Tidak Hadir";
                        },
                    ],
                    'nik',
                    'nama',
                    'email:email',
                    'no_telp',
                    [
                        'attribute' => 'tanggal_lahir',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Tanggal::toReadableDate($model->tanggal_lahir);
                        },
                    ],
                    'tempat_lahir',

                    [
                        'class' => yii\grid\DataColumn::className(),
                        'attribute' => 'jenis_kelamin_id',
                        'value' => function ($model) {
                            return $model->jenisKelamin->nama;
                        },
                        'format' => 'raw',
                    ],

                    [
                        'class' => yii\grid\DataColumn::className(),
                        'attribute' => 'pendidikan_id',
                        'value' => function ($model) {
                            return $model->pendidikan->nama;
                        },
                        'format' => 'raw',
                    ],
                    'nilai_posttest',
                    'nilai_pretest',
                    'nilai_praktek',
                    'komentar',
                ],
            ])
            . '</div>' ?>
        <?php Pjax::end() ?>
        <?php $this->endBlock() ?>


        <?php $this->beginBlock('PelatihanSoalJenis'); ?>
        <?php Pjax::begin(['id' => 'pjax-PelatihanSoalJenis', 'enableReplaceState' => false, 'linkSelector' => '#pjax-PelatihanSoalJenis ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
        <?= '<div class="table-responsive">'
            . \yii\grid\GridView::widget([
                'layout' => '{summary}{pager}<br/>{items}{pager}',
                'dataProvider' => new \yii\data\ActiveDataProvider([
                    'query' => $model->getPelatihanSoalJenis()->where(['not in', 'jenis_id', [Constant::SOAL_JENIS_KUESIONER_KEPUASAN, Constant::SOAL_JENIS_KUESIONER_MONEV]]),
                    'pagination' => [
                        'pageSize' => 20,
                        'pageParam' => 'page-pelatihansoaljenis',
                    ],
                ]),
                'pager' => [
                    'class' => app\components\mazer\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last',
                ],
                'columns' => [
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view} {update}',
                        'contentOptions' => ['nowrap' => 'nowrap'],
                        'urlCreator' => function ($action, $model, $key, $index) {
                            // using the column name as key, not mapping to 'id' like the standard generator
                            $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                            $params[0] = 'pelatihan-soal-jenis' . '/' . $action;
                            $params['PelatihanSoalJenis'] = ['pelatihan_id' => $model->primaryKey()[0]];
                            return $params;
                        },
                        'buttons' => [
                            'update' => function ($model) {
                                // $item = PelatihanSoalJenis::findOne($model['id']);
                                return "<a href='update-soal?id={$model['id']}'><i class='fa fa-pencil'></i></a>";
                            },
                        ],
                        'controller' => 'pelatihan-soal-jenis',
                    ],
                    // 'id',
                    [
                        'class' => yii\grid\DataColumn::className(),
                        'attribute' => 'jenis_id',
                        'value' => function ($model) {
                            return $model->jenis->nama;
                        },
                        'format' => 'raw',
                    ],
                    'waktu_pengerjaan',
                    'jumlah_soal',
                ],
            ])
            . '</div>' ?>
        <?php Pjax::end() ?>
        <?php $this->endBlock() ?>


        <?= Tabs::widget(
            [
                'id' => 'relation-tabs',
                'encodeLabels' => false,
                'items' => [[
                    'label' => '<b class=""># ' . $model->nama . '</b>',
                    'content' => $this->blocks['app\models\Pelatihan'],
                    'active' => true,
                ], [
                    'content' => $this->blocks['PelatihanLampirans'],
                    'label' => '<small>Lampiran / Berkas <span class="badge badge-default">' . count($model->getPelatihanLampirans()->asArray()->all()) . '</span></small>',
                    'active' => false,
                ], [
                    'content' => $this->blocks['PelatihanPesertas'],
                    'label' => '<small>Peserta <span class="badge badge-default">' . count($model->getPelatihanPesertas()->asArray()->all()) . '</span></small>',
                    'active' => false,
                ], [
                    'content' => $this->blocks['PelatihanSoalJenis'],
                    'label' => '<small>Pre-test & Post-test <span class="badge badge-default">' . count($model->getPelatihanSoalJenis()->where(['not in', 'jenis_id', [Constant::SOAL_JENIS_KUESIONER_KEPUASAN, Constant::SOAL_JENIS_KUESIONER_MONEV]])->asArray()->all()) . '</span></small>',
                    'active' => false,
                ]],
            ]
        );
        ?>
    </div>
</div>
</div>