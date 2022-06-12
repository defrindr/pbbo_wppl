<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\Instansi $model
 */

$this->title = Yii::t('models', 'Create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Instansi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud instansi-create">

    <div class="card card-default">
        <div class="card-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]); ?>
        </div>
    </div>


</div>