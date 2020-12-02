<?php

/* @var $this yii\web\View */

use app\components\Tanggal;
use app\models\Setting;
use app\models\Barang;
use app\models\StokBarang;
use yii\helpers\Html;

$this->title = 'Daftar Pelatihan';

?>

<div class="site-index">

    <div class="row">

        <?php if(count($model)) : ?>
        <?php foreach($model as $o):
            $status = ((strtotime(date('Y-m-d H:i:s')) >= strtotime($o->tanggal_mulai)) && (strtotime(date('Y-m-d H:i:s')) <= strtotime($o->tanggal_selesai))) ? 1 : 0;
            ?>
        <div class="col-lg-3 col-sm-6 col-xs-12">
            <!-- small box -->
            <div class="small-box <?= ($status) ? "bg-aqua" : "bg-red" ?>">
                <div class="inner">
                    <h3><?= count($o->getPelatihanPesertas()) ?> Peserta</h3>

                    <p>
                        <?= $o->nama ?>
                        <br>
                        <?= Tanggal::toReadableDate($o->tanggal_mulai) ." / ". Tanggal::toReadableDate($o->tanggal_selesai) ?>
                    </p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',["detail-pelatihan/$o->unique_id"],['class' => 'small-box-footer']) ?>
            </div>
        </div>
        <!-- ./col -->
        <?php endforeach ?>
        <?php else: ?>
        <div class="col-lg-6 col-xs-12">
            <div class="box box-danger">
                <div class="box-body">
                    Anda belum Mengikuti Pelatihan Apapun
                </div>
            </div>
        </div>
        <?php endif ?>
    </div>

</div>