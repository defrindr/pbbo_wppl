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
        background-image: url("https://backgroundcheckall.com/wp-content/uploads/2017/12/background-desain-sertifikat-2.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        text-align: center;
    }

    @media print {

        body,
        page[size="A4"] {
            margin: 0;
            box-shadow: 0;
        }
    }

    img {
        width: 80pt;
        padding-top: 40pt;
        margin-top: 0;
    }

    h1 {
        font-size: 36pt;
    }

    p {
        margin: 8pt;
    }

    .textbiasa {
        font-size: 14pt;
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
        <img src="https://seeklogo.com/images/S/sidoarjo-logo-5B22446ACF-seeklogo.com.png" />
        <h1>SERTIFIKAT</h1>
        <p class='textbiasa'>Diberika Kepada</p>
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