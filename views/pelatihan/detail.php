<?php

/* @var $this yii\web\View */
use app\models\Setting;
use app\models\Barang;
use app\models\StokBarang;
$this->title = 'Pelatihan : '. $model->nama;

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

    <?php if(count($model)) :
            foreach($model->getPelatihanSoalJenis()->all() as $o): ?>
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
                <a href="<?= \yii\helpers\Url::to([(($o->jenis_id == 1)) ? "/pretest" : '/posttest', "unique_id" => $model->unique_id]) ?>" class="small-box-footer">Mulai</a>
            </div>
        </div>
        <!-- ./col -->
        <?php endforeach ?>
    <?php endif ?>
    </div>

</div>
