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
        <?php if ($outl == TRUE && $stk != NULL) { ?>
            <style>
                .content {
                    min-height: 0px;
                    padding-top: 5px;
                    margin-right: auto;
                    margin-left: auto;
                    padding-left: 15px;
                    padding-right: 15px;
                }
            </style>
            <div class="content">
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> Info!</h4>
                    <?php foreach ($stk as $i => $s) {
                        $dat = Barang::find()->where(['id' => $s['id_barang']])->one();
                        echo 'Barang : ' . $dat->nama . ', Stok dibawah ' . $min . '<hr>';
                    }; ?>
                </div>
            </div>

        <?php } ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>

                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>

                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
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