<?php

/* @var $this yii\web\View */

use app\components\Constant;
use app\models\PelatihanSoalPeserta;
use app\models\User;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Pelatihan : ' . $model->nama;
?>

<div class="site-index">
    <div class="row">
        <?php if ($model):
    $model_peserta = User::findOne(Yii::$app->user->identity->id)->getPelatihanPesertas()->where(['pelatihan_id' => $model->id])->one();
    $sudah_selesai = $model->getPelatihanSoalJenis()->where(['jenis_id' => [Constant::SOAL_JENIS_POSTTEST, Constant::SOAL_JENIS_PRETEST]])->select('id')->asArray()->all();
    $list_selesai = [];
    foreach ($sudah_selesai as $id) {
        array_push($list_selesai, $id['id']);
    }

    $check_selesai = PelatihanSoalPeserta::find()->where(['peserta_id' => $model_peserta->id, 'jenis_soal' => $list_selesai, 'selesai' => 1])->count();
    $data = $model->getPelatihanSoalJenis()->where(['jenis_id' => [Constant::SOAL_JENIS_POSTTEST, Constant::SOAL_JENIS_PRETEST]])->all();
    if ($check_selesai == 2) {
        $data = $model->getPelatihanSoalJenis()->all();
    }
    foreach ($data as $o):
        $data = [];
        $model_soal_peserta = PelatihanSoalPeserta::findOne(['peserta_id' => $model_peserta->id, 'jenis_soal' => $o->id]);

        switch ($o->jenis_id) {
            case Constant::SOAL_JENIS_PRETEST:
                $data['link'] = Url::to(["/pretest/$model->unique_id"]);
                $data['bg'] = "bg-aqua";
                break;
            case Constant::SOAL_JENIS_POSTTEST:
                $data['link'] = Url::to(["/posttest/$model->unique_id"]);
                $data['bg'] = "bg-aqua";
                break;
            case Constant::SOAL_JENIS_KUESIONER_MONEV:
                $data['link'] = Url::to(["/kuesioner-monev/$model->unique_id"]);
                $data['bg'] = "bg-purple";
                break;
            case Constant::SOAL_JENIS_KUESIONER_KEPUASAN:
                $data['link'] = Url::to(["/kuesioner-kepuasan/$model->unique_id"]);
                $data['bg'] = "bg-purple";
                break;
            default:
                $data['link'] = "#";
                $data['bg'] = "bg-aqua";
                break;
        }

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
            } elseif ($model_soal_peserta->selesai) {
            $data = [
                "text" => "Anda Telah Menyelesaikan Soal Pelatihan ini.",
                "bg" => "bg-red",
                "link" => "#",
                "options" => [
                    "class" => "small-box-footer",
                ],
            ];
        } else {
            $data = [
                "text" => "Lanjutkan",
                "bg" => 'bg-blue',
                "link" => $data['link'],
                "options" => [
                    "class" => "small-box-footer",
                ],
            ];
        }

    } else {
        $data = [
            "text" => "Mulai",
            "bg" => $data['bg'],
            "link" => $data['link'],
            "options" => [
                "class" => "small-box-footer",
                "title" => "Konfirmasi",
                "data-confirm" => "Apakah anda yakin sudah siap ?",
                "data-method" => "POST",
            ],
        ];
    }

    ?>
					        <div class="col-lg-3 col-sm-6 col-xs-12">
					            <!-- small box -->
					            <div class="small-box <?=$data['bg']?>">
					                <div class="inner">
					                    <h3><?=$o->jenis->nama?></h3>
					                    <p>Waktu : <?=$o->waktu_pengerjaan?> Menit</p>
					                </div>
					                <div class="icon">
					                    <i class="ion ion-bag"></i>
					                </div>
					                <?=Html::a($data['text'], $data['link'], $data['options']);?>
					            </div>
					        </div>
					        <!-- ./col -->
					        <?php endforeach?>
	        <?php endif?>
    </div>

</div>