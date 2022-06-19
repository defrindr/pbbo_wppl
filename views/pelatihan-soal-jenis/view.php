<?php

use app\components\mazer\Tabs;
use dmstr\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var app\models\PelatihanSoalJenis $model
 */

$this->title = 'Pelatihan ' . $model->pelatihan->nama;
$this->params['breadcrumbs'][] = ['label' => "Soal {$model->pelatihan->nama}", 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string) $model->jenis->nama, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud pelatihan-soal-jenis-view">
    <p>
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

    <div class="box box-default">
        <div class="box-body">
            <?php $this->beginBlock('app\models\PelatihanSoalJenis');?>

            <?=DetailView::widget([
                'model' => $model,
                'attributes' => [
                    // 'id',
                    [
                        'format' => 'html',
                        'attribute' => 'jenis_id',
                        'value' => $model->jenis->nama
                    ],
                    [
                        'format' => 'html',
                        'attribute' => 'pelatihan_id',
                        'value' => $model->pelatihan->nama
                    ],
                    'waktu_pengerjaan',
                    'jumlah_soal',
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



<?php $this->beginBlock('PelatihanSoals');?>

<?php Pjax::begin(['id' => 'pjax-PelatihanSoals', 'enableReplaceState' => false, 'linkSelector' => '#pjax-PelatihanSoals ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']])?>
<?='<div class="table-responsive">'
. \yii\grid\GridView::widget([
    'layout' => '{summary}{pager}<br/>{items}{pager}',
    'dataProvider' => new \yii\data\ActiveDataProvider([
        'query' => $model->getPelatihanSoals(),
        'pagination' => [
            'pageSize' => 20,
            'pageParam' => 'page-pelatihansoals',
        ],
    ]),
    'pager' => [
        'class' => app\components\mazer\LinkPager::className(),
        'firstPageLabel' => 'First',
        'lastPageLabel' => 'Last',
    ],
    'columns' => [
        // [
        //     'class' => 'yii\grid\ActionColumn',
        //     'template' => '{view} {update}',
        //     'contentOptions' => ['nowrap' => 'nowrap'],
        //     'urlCreator' => function ($action, $model, $key, $index) {
        //         // using the column name as key, not mapping to 'id' like the standard generator
        //         $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
        //         $params[0] = 'pelatihan-soal' . '/' . $action;
        //         $params['PelatihanSoal'] = ['jenis_id' => $model->primaryKey()[0]];
        //         return $params;
        //     },
        //     'buttons' => [
        //     ],
        //     'controller' => 'pelatihan-soal',
        // ],
        // 'id',


        // 'nomor',
        [
            'class' => yii\grid\DataColumn::className(),
            'attribute' => 'kategori_soal_id',
            'value' => function ($model) {
                return $model->kategoriSoal->nama;
            },
            'format' => 'raw',
        ],
        'soal:ntext',
        // 'pilihan:ntext',
        'jawaban:ntext',
    ],
])
. '</div>'?>
<?php Pjax::end()?>
<?php $this->endBlock()?>


            <?=Tabs::widget(
            [
                'id' => 'relation-tabs',
                'encodeLabels' => false,
                'items' => [[
                    'label' => '<b class=""># ' . $model->id . '</b>',
                    'content' => $this->blocks['app\models\PelatihanSoalJenis'],
                    'active' => true,
                ], [
                    'content' => $this->blocks['PelatihanSoals'],
                    'label' => '<small>Pelatihan Soals <span class="badge badge-default">' . count($model->getPelatihanSoals()->asArray()->all()) . '</span></small>',
                    'active' => false,
                ]],
            ]
        );
        ?>
        </div>
    </div>
</div>
