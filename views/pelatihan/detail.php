<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Pelatihan : ' . $model->nama;
?>

<div class="site-index">

    <div class="row">
        <?php if ($model):
    foreach ($model->getPelatihanSoalJenis()->all() as $o): ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?= $o->jenis->nama ?></h3>
                    <p>Waktu : <?= $o->waktu_pengerjaan ?> Menit</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <?= Html::a("Mulai",
                    [($o->jenis_id == 1) ? "/pretest/$model->unique_id" : "/posttest/$model->unique_id"], [
                        "class" => "small-box-footer",
                        "title" => "Konfirmasi",
                        "data-confirm" => "Apakah anda yakin sudah siap ?",
                        "data-method" => "POST",
                    ]);
                ?>
            </div>
        </div>
        <!-- ./col -->
        <?php endforeach ?>
        <?php endif ?>
    </div>

</div>
