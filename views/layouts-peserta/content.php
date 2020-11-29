<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

$this->registerCss('
.timer_style {
    font-size: 18px;
}
.content-header>.breadcrumb{
    top: 10px;
}
');
?>
<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <h1>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
            </h1>
        <?php } ?>
        <ul class="breadcrumb">
            <li class="timer_style">
                <i class="fa fa-clock-o" style="margin-right: 5px;"></i>
                <span id='countdown'></span>
            </li>
        </ul>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; <?= date('Y') ?> <a href="#"><?= \Yii::$app->name ?></a>.</strong> All rights
    reserved.
</footer>
