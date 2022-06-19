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

<div class="box box-default">
    <div class="box-body">
        <?php echo $this->render('_form', [
            'model' => $model,
        ]); ?>
    </div>
</div>