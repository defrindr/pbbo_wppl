<?php

use dmstr\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use app\components\mazer\Tabs;

/**
 * @var yii\web\View $this
 * @var app\models\User $model
 */

$this->title = 'User ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud user-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . 'Edit', ['update', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
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
        <div class="card-header">
            <h2>
                <?= $model->name ?> </h2>
        </div>

        <div class="card-body">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'username',
                    'name',
                    [
                        'format' => 'html',
                        'attribute' => 'role_id',
                        'value' => ($model->getRole()->one() ? Html::a($model->getRole()->one()->name, ['role/view', 'id' => $model->getRole()->one()->id,]) : '<span class="label label-warning">?</span>'),
                    ],
                    'photo_url:url',
                    'last_login:datetime',
                    'last_logout:datetime',
                    [
                        'class' => yii\grid\DataColumn::className(),
                        'attribute' => 'textPelatihanDiikuti',
                        'format' => 'raw',
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
        </div>
    </div>
</div>