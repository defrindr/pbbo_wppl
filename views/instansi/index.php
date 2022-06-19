<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search\InstansiSearch $searchModel
 */

$this->title = Yii::t('models', 'Instansi');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span class="fa fa-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
}
?>
<div class="giiant-crud instansi-index">
    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>
    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?= Html::a('<span class="fa fa-plus"></span> ' . 'Tambah', ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <hr />

    <div class="box box-default">
        <div class="box-body">

            <div class="table table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'pager' => [
                        'class' => app\components\mazer\LinkPager::className(),
                        'firstPageLabel' => 'First',
                        'lastPageLabel' => 'Last',
                    ],
                    'filterModel' => $searchModel,
                    'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                    'headerRowOptions' => ['class' => 'x'],
                    'columns' => [
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template' => "{update} {delete}",
                            'buttons' => [
                                'update' => function ($url, $model, $key) {
                                    return Html::a('<span class="fa fa-pencil"></span>', $url, ['class' => 'btn btn-primary btn-xs']);
                                },
                                'delete' => function ($url, $model, $key) {
                                    return Html::a('<span class="fa fa-trash"></span>', $url, ['class' => 'btn btn-danger btn-xs', 'data-confirm' => 'Are you sure you want to delete this item?', 'data-method' => 'post']);
                                },
                            ],
                            'urlCreator' => function ($action, $model, $key, $index) {
                                // using the column name as key, not mapping to 'id' like the standard generator
                                $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string) $key];
                                $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                                return Url::toRoute($params);
                            },
                            'contentOptions' => ['nowrap' => 'nowrap']
                        ],
                        'nama',
                    ]
                ]); ?>
            </div>
        </div>
    </div>

</div>


<?php \yii\widgets\Pjax::end() ?>