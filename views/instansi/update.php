<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Instansi $model
 */

$this->title = Yii::t('models', 'Instansi');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Instansi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud instansi-update">

    <div class="card card-default">
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]); ?>
        </div>
    </div>

</div>