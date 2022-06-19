<?php

/* @var $this yii\web\View */

use app\models\Setting;
use app\models\Barang;
use app\models\StokBarang;

$this->title = 'Dashboard';

//$tableData = array_diff($tableData,$stk);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>

<div class="site-index">

    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="box">
                <div class="box-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon blue">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">User</h6>
                            <h6 class="font-extrabold mb-0"><?= $countUser ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="box">
                <div class="box-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon white">
                                <i class="iconly-boldDocument"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Pelatihan</h6>
                            <h6 class="font-extrabold mb-0"><?= $countPelatihan ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="box">
                <div class="box-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon red">
                                <i class="iconly-boldBookmark"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Instansi</h6>
                            <h6 class="font-extrabold mb-0"><?= $countInstansi ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="box">
                <div class="box-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon green">
                                <i class="iconly-boldActivity"></i>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Pelatihan Bulan Ini</h6>
                            <h6 class="font-extrabold mb-0"><?= $countPelatihanBulanIni ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='row'>
        <div class='col-md-6'>
            <?= $this->render('_chart_pelatihan_tingkat.php') ?>
        </div>
        <div class='col-md-6'>
            <?= $this->render('_chart_pelatihan_user_pembuat.php') ?>
        </div>
        <div class='col-md-12'>
            <?= $this->render('_chart_pelatihan_bulan.php') ?>
        </div>
    </div>
</div>