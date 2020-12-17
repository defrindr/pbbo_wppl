<?php

use yii\grid\GridView;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\PelatihanPesertaSearch $searchModel
 */

$this->title = 'Pelatihan Peserta';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
    <?=Html::a('<i class="fa fa-plus"></i> Tambah Baru', ['create'], ['class' => 'btn btn-success'])?>
</p>


    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']])?>

    <div class="box box-info">
        <div class="box-body">
            <div class="table-responsive">
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

                    \app\components\ActionButton::getButtons(),

                    
                    [
                        'class' => yii\grid\DataColumn::className(),
                        'attribute' => 'pelatihan_id',
                        'value' => function ($model) {
                            if ($rel = $model->pelatihan) {
                                return Html::a($rel->id, ['pelatihan/view', 'id' => $rel->id], ['data-pjax' => 0]);
                            } else {
                                return '';
                            }
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
            </div>
        </div>
    </div>

    <?php \yii\widgets\Pjax::end()?>

