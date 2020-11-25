<?php

use dmstr\bootstrap\Tabs;
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
        <?= Html::a('Kembali', ["/pelatihan/view", 'id' => $model->pelatihan_id],['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null): ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?=\Yii::$app->session->getFlash('deleteError')?>
        </span>
    <?php endif;?>

    <div class="box box-info">
        <div class="box-body">
        <?php $this->beginBlock('app\models\PelatihanPeserta');?>

    <?=DetailView::widget([
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
        [
            'format' => 'html',
            'attribute' => 'desa_id',
            'value' => $model->desa->nama,
        ],
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
]);?>

            <hr/>

            <?=Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
    [
        'class' => 'btn btn-danger',
        'data-confirm' => '' . 'Are you sure to delete this item?' . '',
        'data-method' => 'post',
    ]);?>
            <?php $this->endBlock();?>



<?php $this->beginBlock('PelatihanSoalPesertas');?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
  <?=Html::a(
    '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Pelatihan Soal Pesertas',
    ['pelatihan-soal-peserta/index'],
    ['class' => 'btn text-muted btn-xs']
)?>
  <?=Html::a(
    '<span class="glyphicon glyphicon-plus"></span> ' . 'Tambah Baru' . ' Pelatihan Soal Peserta',
    ['pelatihan-soal-peserta/create', 'PelatihanSoalPeserta' => ['peserta_id' => $model->id]],
    ['class' => 'btn btn-success btn-xs']
);?>
</div></div><?php Pjax::begin(['id' => 'pjax-PelatihanSoalPesertas', 'enableReplaceState' => false, 'linkSelector' => '#pjax-PelatihanSoalPesertas ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']])?>
<?='<div class="table-responsive">'
. \yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getPelatihanSoalPesertas(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam' => 'page-pelatihansoalpesertas',
        ],
    ]),
    'pager' => [
        'class' => yii\widgets\LinkPager::className(),
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
                $params[0] = 'pelatihan-soal-peserta' . '/' . $action;
                $params['PelatihanSoalPeserta'] = ['peserta_id' => $model->primaryKey()[0]];
                return $params;
            },
            'buttons' => [

            ],
            'controller' => 'pelatihan-soal-peserta',
        ],
        'id',
        'jenis_soal',
        'waktu_mulai',
        'waktu_selesai',
    ],
])
. '</div>'?>
<?php Pjax::end()?>
<?php $this->endBlock()?>


<?php $this->beginBlock('PelatihanSoalPesertaJawabans');?>
<div style='position: relative'><div style='position:absolute; right: 0px; top: 0px;'>
  <?=Html::a(
    '<span class="glyphicon glyphicon-list"></span> ' . 'List All' . ' Pelatihan Soal Peserta Jawabans',
    ['pelatihan-soal-peserta-jawaban/index'],
    ['class' => 'btn text-muted btn-xs']
)?>
  <?=Html::a(
    '<span class="glyphicon glyphicon-plus"></span> ' . 'Tambah Baru' . ' Pelatihan Soal Peserta Jawaban',
    ['pelatihan-soal-peserta-jawaban/create', 'PelatihanSoalPesertaJawaban' => ['peserta_id' => $model->id]],
    ['class' => 'btn btn-success btn-xs']
);?>
</div></div><?php Pjax::begin(['id' => 'pjax-PelatihanSoalPesertaJawabans', 'enableReplaceState' => false, 'linkSelector' => '#pjax-PelatihanSoalPesertaJawabans ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']])?>
<?='<div class="table-responsive">'
. \yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getPelatihanSoalPesertaJawabans(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam' => 'page-pelatihansoalpesertajawabans',
        ],
    ]),
    'pager' => [
        'class' => yii\widgets\LinkPager::className(),
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
                $params[0] = 'pelatihan-soal-peserta-jawaban' . '/' . $action;
                $params['PelatihanSoalPesertaJawaban'] = ['peserta_id' => $model->primaryKey()[0]];
                return $params;
            },
            'buttons' => [

            ],
            'controller' => 'pelatihan-soal-peserta-jawaban',
        ],
        'id',
// generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
        [
            'class' => yii\grid\DataColumn::className(),
            'attribute' => 'soal_id',
            'value' => function ($model) {
                if ($rel = $model->soal) {
                    return Html::a($rel->id, ['pelatihan-soal/view', 'id' => $rel->id], ['data-pjax' => 0]);
                } else {
                    return '';
                }
            },
            'format' => 'raw',
        ],
        'jabawan:ntext',
    ],
])
. '</div>'?>
<?php Pjax::end()?>
<?php $this->endBlock()?>



<?php $this->beginBlock('PelatihanPesertIkuts');?>
<?php Pjax::begin(['id' => 'pjax-PelatihanSoalPesertaikuts', 'enableReplaceState' => false, 'linkSelector' => '#pjax-PelatihanSoalPesertaIkuts ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']])?>
<?='<div class="table-responsive">'
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
        'class' => yii\widgets\LinkPager::className(),
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
    ],
    'columns' => [
        'nama',
        // 'latar_belakang:ntext',
        // 'tujuan:ntext',
        'tanggal_mulai',
        // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
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
        // generated by schmunk42\giiant\generators\crud\providers\core\RelationProvider::columnFormat
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
        // 'modified_by',
        /*'tanggal_selesai'*/
        /*'modified_at'*/
        [
            'attribute' => 'forum_diskusi',
            'format' => 'raw',
            'value' => function($model){
                return "<a href='$model->forum_diskusi' target='_blank'>$model->forum_diskusi</a>";
            }
        ],
        [
            'class' => yii\grid\DataColumn::class,
            'attribute' => 'status_id',
            'value' => function ($model) {
                if ($rel = $model->status) {
                    return $rel->nama;
                } else {
                    return '';
                }
            },
            'format' => 'raw',
        ],
    ],
])
. '</div>'?>
<?php Pjax::end()?>
<?php $this->endBlock()?>



            <?=Tabs::widget([
    'id' => 'relation-tabs',
    'encodeLabels' => false,
    'items' => [
        [
            'label' => '<b class=""># ' . $model->nik . '</b>',
            'content' => $this->blocks['app\models\PelatihanPeserta'],
            'active' => true,
        ], [
            'content' => $this->blocks['PelatihanSoalPesertas'],
            'label' => '<small>Pelatihan Soal Pesertas <span class="badge badge-default">' . count($model->getPelatihanSoalPesertas()->asArray()->all()) . '</span></small>',
            'active' => false,
        ], [
            'content' => $this->blocks['PelatihanSoalPesertaJawabans'],
            'label' => '<small>Pelatihan Soal Peserta Jawabans <span class="badge badge-default">' . count($model->getPelatihanSoalPesertaJawabans()->asArray()->all()) . '</span></small>',
            'active' => false,
        ], [
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
