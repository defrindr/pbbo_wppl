<?php

use yii\grid\GridView;
use yii\helpers\Html;

?>

<?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

<div class="table-responsive">
    <?= GridView::widget([
        'layout' => '{summary}{pager}{items}{pager}',
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => yii\widgets\LinkPager::className(),
            'firstPageLabel' => 'First',
            'lastPageLabel' => 'Last'
        ],
        'filterModel' => $searchModel,
        'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
        'headerRowOptions' => ['class' => 'x'],
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'checkboxOptions' => function ($model) {
                    return [
                        'value' => $model->id,
                        'checked' => ($model->kehadiran == 1) ? true : false,
                    ];
                },
            ],
            'nik',
            'nama',
            'nilai_pretest',
            'nilai_posttest',
            'nilai_praktek',
        ],
    ]); ?>
</div>

<?php \yii\widgets\Pjax::end() ?>