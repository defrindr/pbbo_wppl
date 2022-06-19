<?php

/** 
 * @var app\models\Pelatihan $model
 */

use app\components\Tanggal;
use app\models\User;
use yii\base\Model;

?>

<style>
    body {
        background: rgb(204, 204, 204);
    }

    page[size="A4"] {
        background: white;
        height: 21cm;
        width: 29.7cm;
        display: block;
        margin: 0 auto;
        margin-bottom: 1.5cm;
        margin-top: 1.5cm;
        background-image: url("https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjY7evICDkZOQTsXuTFDMeQtSlpiKc2Y62MYGoc7V4PGdIQ4-gopCd4xxw0ycZxaXeQh_h2YvIYCfpg7kofeCxb-tpGSJQuIP4uc44d4xi3YFakVqTKkxarqC10AvbYZjd4lGL9TJbYnkDKjATIlE6AOzHlbvuPBlW9YM3gIW1gHS4ZPblEM3Lnybo_/w640-h452/background%20piagam%20sertifikat%20kosong%20polos%20(12).png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        text-align: center;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
    }

    @media print {

        body,
        page[size="A4"] {
            margin: 0;
            box-shadow: 0;
        }
    }

    img {
        width: 150pt;
        padding-top: 40pt;
        margin-top: 0;
    }

    h1 {
        font-size: 32pt;
    }

    p {
        margin: 4pt;
    }

    .textbiasa {
        font-size: 14pt;
        margin: 0;
    }

    .namapeserta {
        font-size: 24pt;
        color: #1167b1;
        padding: 5pt;
        border-bottom: 3pt solid #1167b1;
        display: inline-block;
        margin-bottom: 10pt;
        margin-top: 0;
    }

    .namapenyelenggara {
        font-size: 20pt;
    }

    .namapelatihan {
        font-size: 20pt;
        font-weight: bold;
    }

    .namakepala {
        text-decoration: underline;
        margin-bottom: 6pt !important;
    }
</style>
<?php
$cretedby = User::findOne(['id' => $model->created_by])
?>
<?php foreach ($model->pelatihanPesertas as $p) { ?>

    <page size="A4">
        <img src="<?= \Yii::$app->request->baseUrl."/uploads/logo.png" ?>" />
        <h1>SERTIFIKAT</h1>
        <p class='textbiasa'>Diberikan Kepada</p>
        <p class='namapeserta'>&nbsp;&nbsp;&nbsp;<?= $p->nama ?>&nbsp;&nbsp;&nbsp;</p>
        <p class='textbiasa'>Sebagai Peserta</p>
        <p class='namapelatihan'><?= $model->nama ?></p>
        <p class='textbiasa'>Diseleggarakan Oleh</p>
        <p class='namapenyelenggara'><?= $cretedby->name ?></p>
        <p class='textbiasa'>
            <?= $model->kota ?>,
            <?php
            if ($model->tanggal_mulai == $model->tanggal_selesai) {
                echo Tanggal::toReadableDate($model->tanggal_mulai);
            } else {
                echo Tanggal::toReadableDate($model->tanggal_mulai) . " s/d " . Tanggal::toReadableDate($model->tanggal_selesai);
            }
            ?>
        </p>


        <p class='textbiasa'><br /><br /><br /><b>Kepala <?= $cretedby->name ?></b><br /><br /><br /></p>
        <p class='textbiasa namakepala'><b>&nbsp;<?= $model->nama_penandatangan ?>&nbsp;</b></p>
        <p class='textbiasa' style="margin-top: 0;"><b>NIP. <?= $model->nip_penandatangan ?></b></p>
    </page>
<?php } ?>