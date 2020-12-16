<?php

use app\components\Constant;
use yii\helpers\Url;
 ?>
<div class="box-header">
</div>
<div class="box-body">
    <form id="form-soal">
        <input type="hidden" name="pelatihan_id" id="pelatihan-id-<?= $model->unique_id ?>"
            value="<?= $model->unique_id ?>">
        <?php 
        foreach ($soals as $id => $soal): 
        $jawaban = $soal->getPelatihanSoalPesertaJawabans()->where(['peserta_id' => $soal_peserta->id, 'soal_id' => $soal->id])->one(); 
        ?> 
            <h4>
                <?= $soal->order . "). " . $soal->soal ?>
            </h4>


        <?php if ($soal->kategori_soal_id == Constant::SOAL_TYPE_PILIHAN_GANDA):  ?>
        <input type="hidden" name="soal_id" id="soal-id-<?= $soal->unique_id ?>" value="<?= $soal->unique_id ?>">
        <input type="hidden" name="pelatihan_id" id="pelatihan-id-<?= $model->unique_id ?>" value="<?= $model->unique_id ?>">
            <?php foreach ($soal->pelatihanSoalPilihans as $pilihan):  ?>
            <div class="form-group">
                <input type="Radio" name="jawaban[<?= $soal->unique_id ?>]" id="soal-jawaban-<?= $soal->unique_id ?>" value="<?= $pilihan->pilihan ?>" <?=($jawaban->jawaban == $pilihan->pilihan) ? "checked" : "" ?>>
                <label class="form-check-label" for="soal-<?= $soal->unique_id ?>">
                    <?= $pilihan->pilihan ?>
                </label>
            </div>
            <?php endforeach ?>


        <?php elseif ($soal->kategori_soal_id == Constant::SOAL_TYPE_ESSAY): ?>
            <div class="form-group">
                <input type="hidden" name="soal_id" id="soal-id-<?= $soal->unique_id ?>" value="<?= $soal->unique_id ?>">

            <input type="hidden" name="pelatihan_id" id="pelatihan-id-<?= $model->unique_id ?>" value="<?= $model->unique_id ?>">
                <textarea name="jawaban[<?= $soal->unique_id ?>]" id="soal-<?= $soal->unique_id ?>" cols="30" rows="10" class="form-control"
                    placeholder="Jawaban Anda"><?= $jawaban->jawaban ?></textarea>
            </div>



        <?php elseif ($soal->kategori_soal_id == Constant::SOAL_TYPE_JAWABAN_SINGKAT): ?>
            <input type="hidden" name="soal_id" id="soal-id-<?= $soal->unique_id ?>" value="<?= $soal->unique_id ?>">
            <input type="hidden" name="pelatihan_id" id="pelatihan-id-<?= $model->unique_id ?>" value="<?= $model->unique_id ?>">
            <?php foreach ($soal->pelatihanSoalPilihans as $pilihan):  ?>
            <div class="form-group">
                <input type="text" name="jawaban[<?= $soal->unique_id ?>]" id="soal-<?= $soal->unique_id ?>" class="form-control"
                    placeholder="Jawaban Anda" value="<?= $jawaban->jawaban ?>">
            </div>
            <?php endforeach ?>



        <?php elseif ($soal->kategori_soal_id == Constant::SOAL_TYPE_CHECKBOX):  ?>
            <input type="hidden" name="soal_id" id="soal-id-<?= $soal->unique_id ?>" value="<?= $soal->unique_id ?>">
            <input type="hidden" name="pelatiahn_id" id="pelatiahn-id-<?= $model->unique_id ?>" value="<?= $model->unique_id ?>">
            <?php foreach ($soal->pelatihanSoalPilihans as $pilihan):  ?>
                <div class="form-group">
                    <input type="checkbox" name="jawaban[<?= $soal->unique_id ?>][]" id="soal-<?= $soal->unique_id ?>" value="<?= $pilihan->pilihan ?>"
                    <?php foreach (explode("|", $jawaban->jawaban) as $checked):
                        if ($checked == $pilihan->pilihan) {
                            echo "checked";
                            break;
                        }
                    endforeach ?> >
                    <label class="form-check-label" for="soal-<?= $soal->unique_id ?>">
                        <?= $pilihan->pilihan ?>
                    </label>
                </div>
            <?php endforeach ?>

        <?php endif ?>
        <?php endforeach ?>
    </form>
    <?php
if ($current_page > 1):  ?>
    <a class="btn btn-default btn-flat" href="#" onclick="handleChangeSoal(this)"
        data-soal="<?= $current_page - 1 ?>">Kembali</a>
    <?php endif ?>
    <?php if ($current_page < $total_page):  ?>
    <a class="btn btn-default btn-flat" href="#" onclick="handleChangeSoal(this)"
        data-soal="<?= $current_page + 1 ?>">Selanjutnya</a>
    <?php endif ?>
    <?php if ($current_page == $total_page):  ?>
    <!-- ;window.location = '<?=Url::to(["detail-pelatihan/$model->unique_id"]) ?>' -->
    <a class="btn btn-default btn-flat" href="#" onclick="event.preventDefault();selesai()">Selesai</a>
    <?php endif ?>
</div>
