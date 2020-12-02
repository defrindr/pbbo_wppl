<?php

use app\components\Tanggal;
?>
<html>
    <body>
        <div style="text-align: center;font-size: 14pt">
            <h4>REKAPITULASI HASL PRE-TEST DA POST-TEST</h4>
            (<?= $model->nama ?>)
        </div>
        <hr>
        <table style="border: 0;">
            <tr>
                <td>Nama Narasumber</td>
                <td>:</td>
                <td><?= $model->nama_narasumber ?></td>
            </tr>
            <tr>
                <td>Tanggal Pelaksanaan</td>
                <td>:</td>
                <td><?= Tanggal::toReadableDate($model->tanggal_mulai) ?></td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>:</td>
                <td><?= $model->lokasi ?></td>
            </tr>
        </table>
        <div style="padding: 20px;">
            <table>
                <thead>
                    <th>NO</th>
                    <th>Nama Peserta</th>
                    <th>
                        Nilai Pre-Test
                    </th>
                    <th>
                        Nilai Post-Test
                    </th>
                    <th>
                        Peningkatan
                    </th>
                </thead>
                <tbody>
                    <?php foreach($peserta as $i => $row):
                        $peningkatan = ($row->pretest < $row->posttest) ? "Meningkat" : "Menurun";
                        ?>
                    <tr>
                        <td><?= $i+1 ?></td>
                        <td><?= $row->nama ?></td>
                        <td><?= $row->nilai_pretest ?></td>
                        <td><?= $row->nilai_posttest ?></td>
                        <td><?= $row->nilai_posttest ?></td>
                        <td><?= $peningkatan ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <hr>
    </body>
</html>