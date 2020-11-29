<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?= Html::img(["uploads/".Yii::$app->user->identity->photo_url], ["class"=>"img-circle"]) ?>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->name; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <div class="sidebar-form" style="padding: 10px">
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group mr-2" role="group" aria-label="First group">
            <?php 
            $i = 0;
            foreach($list_id_soal as $soal): ?>
                <a class="btn btn-default" href="#" onclick="handleChangeSoal(this)" data-soal="<?= $i ?>"><?= $i+1 ?></a>
            <?php
            $i++;
            endforeach ?>
                </div>
            </div>
        </div>

    </section>

</aside>
