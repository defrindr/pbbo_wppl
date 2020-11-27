<?php
use yii\helpers\Html;
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

    </section>

</aside>
