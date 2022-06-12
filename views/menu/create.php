<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Menu $model
*/

$this->title = 'Tambah';
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card card-default">
    <div class="card-body">
        <?php echo $this->render('_form', [
            'model' => $model,
        ]); ?>
    </div>
</div>