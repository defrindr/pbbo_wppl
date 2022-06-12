<?php

use app\components\mazer\Breadcrumbs;
use app\components\mazer\Alert;

?>

<div id="main">

    <?= $this->render(
        'header.php'
    ) ?>
    <?=
    Breadcrumbs::widget(
        [
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]
    ) ?>

    <div class="page-heading">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h3><?= $this->blocks['content-header'] ?></h3>
        <?php } else { ?>
            <h3>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
            </h3>
        <?php } ?>
    </div>
    <div class="page-content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://saugi.me">Saugi</a></p>
            </div>
        </div>
    </footer>
</div>