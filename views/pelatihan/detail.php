<?php

/* @var $this yii\web\View */

use app\models\PelatihanSoalPeserta;
use app\models\User;
use yii\helpers\Html;

$this->title = 'Pelatihan : ' . $model->nama;
?>

<div class="site-index">
    <div class="row">
        <?php if ($model):
        foreach ($model->getPelatihanSoalJenis()->all() as $o):
            $data = [];
            $model_peserta = User::findOne(Yii::$app->user->identity->id)->getPelatihanPesertas()->where(['pelatihan_id' => $model->id])->one();
            $model_soal_peserta = PelatihanSoalPeserta::findOne(['peserta_id' => $model_peserta->id, 'jenis_soal' => $o->id]);
            $link = [($o->jenis_id == 1) ? "/pretest/$model->unique_id" : "/posttest/$model->unique_id"];
            if ($model_soal_peserta !== null) {
                $time_now = strtotime(date('Y-m-d H:i:s'));
                if ($time_now > strtotime($model_soal_peserta->waktu_selesai)) {
                    $data = [
                        "text" => "Waktu Pengerjaan telah berakhir",
                        "bg" => "bg-red",
                        "link" => "#",
                        "options" => [
                            "class" => "small-box-footer",
                        ],
                    ];
                } else {
                    $data = [
                        "text" => "Lanjutkan",
                        "bg" => "bg-aqua",
                        "link" => $link,
                        "options" => [
                            "class" => "small-box-footer",
                        ],
                    ];
                }

            } else {
                $data = [
                    "text" => "Mulai",
                    "bg" => "bg-aqua",
                    "link" => $link,
                    "options" => [
                        "class" => "small-box-footer",
                        "title" => "Konfirmasi",
                        "data-confirm" => "Apakah anda yakin sudah siap ?",
                        "data-method" => "POST",
                    ],
                ];
            }
            ?>
		        <div class="col-lg-3 col-xs-6">
		            <!-- small box -->
		            <div class="small-box <?=$data['bg']?>">
		                <div class="inner">
		                    <h3><?=$o->jenis->nama?></h3>
		                    <p>Waktu : <?=$o->waktu_pengerjaan?> Menit</p>
		                </div>
		                <div class="icon">
		                    <i class="ion ion-bag"></i>
		                </div>
		                <?= Html::a($data['text'], $data['link'], $data['options']);?>
		            </div>
		        </div>
		        <!-- ./col -->
		        <?php endforeach?>
	        <?php endif?>
    </div>

</div>