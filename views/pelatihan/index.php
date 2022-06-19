<?php

use app\components\Tanggal;
use app\models\PelatihanJenis;
use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\PelatihanSearch $searchModel
 */

$this->title = 'Pelatihan';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
    <?= Html::a('<i class="fa fa-plus"></i> Tambah Baru', ['create'], ['class' => 'btn btn-success']) ?>
</p>


<?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

<div class="box box-default">
    <div class="box-body">
        <div class="table-responsive">
            <?= GridView::widget([
                'layout' => '{summary}{pager}{items}{pager}',
                'dataProvider' => $dataProvider,
                'pager' => [
                    'class' => app\components\mazer\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last'
                ],
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'headerRowOptions' => ['class' => 'x'],
                'columns' => [

                    \app\components\ActionButton::getButtons(true),
                    [
                        'class' => \yii\grid\SerialColumn::class
                    ],
                    'nama',
                    // 'latar_belakang:ntext',
                    // 'tujuan:ntext',
                    [
                        'attribute' => 'tanggal_mulai',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Tanggal::toReadableDate($model->tanggal_mulai);
                        }
                    ],

                    [
                        'class' => yii\grid\DataColumn::className(),
                        'attribute' => 'materi_pelatihan',
                        'value' => function ($model) {
                            $jenis = PelatihanJenis::findOne($model->jenis);
                            return $jenis == null ? null : $jenis->nama . "<br/>Materi : " . $model->materi_pelatihan;
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
                    // 'modified_by',
                    /*'tanggal_selesai'*/
                    /*'modified_at'*/
                    [
                        'attribute' => 'forum_diskusi',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return "<a href='$model->forum_diskusi' target='_blank'>$model->forum_diskusi</a>";
                        },
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
            ]); ?>
        </div>
    </div>
</div>

<?php \yii\widgets\Pjax::end() ?>