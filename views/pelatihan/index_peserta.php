<?php

/* @var $this yii\web\View */
use app\models\Setting;
use app\models\Barang;
use app\models\StokBarang;
use yii\helpers\Html;

$this->title = 'Daftar Pelatihan';

//$tableData = array_diff($tableData,$stk);
?>

<div class="site-index">

    <div class="row">
      <?php if($outl == TRUE && $stk != NULL){ ?>
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
                <?php foreach($stk as $i => $s){
                    $dat = Barang::find()->where(['id' => $s['id_barang']])->one();
                    echo 'Barang : '.$dat->nama.', Stok dibawah '.$min.'<hr>';
              }; ?>
              </div>
            </div>

    <?php } ?>

    <?php if(count($model)) : ?>
        <?php foreach($model as $o):
            $status = ((strtotime(date('Y-m-d')) > strtotime($o->tanggal_mulai)) && (strtotime(date('Y-m-d')) < strtotime($o->tanggal_selesai))) ? 1 : 0;
            ?>
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box <?= ($status) ? "bg-aqua" : "bg-red" ?>">
                <div class="inner">
                    <h3><?= $o->nama ?></h3>

                    <p><?= date("d F Y", strtotime($o->tanggal_mulai)) ?> s/d <?= date("d F Y", strtotime($o->tanggal_selesai)) ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <?= Html::a('More info <i class="fa fa-arrow-circle-right"></i>',["detail", "unique_id" => $o->unique_id],['class' => 'small-box-footer']) ?>
            </div>
        </div>
        <!-- ./col -->
        <?php endforeach ?>
    <?php endif ?>
    </div>

</div>
