<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Instansi $model
*/

$this->title = Yii::t('models', 'Instansi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Instansis'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud instansi-create">

    <h1>
        <?= Yii::t('models', 'Instansi') ?>
        <small>
            <?= Html::encode($model->id) ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            'Cancel',
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
