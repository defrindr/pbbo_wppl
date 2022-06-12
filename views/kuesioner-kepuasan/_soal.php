<?php
use yii\helpers\Url;
?>
<div class="card-header">
</div>
<div class="card-body">
    <form id="form-soal">
        <input type="hidden" name="pelatihan_id" id="pelatihan-id-<?=$model->unique_id?>"
            value="<?=$model->unique_id?>">
        <?php foreach ($soals as $id => $soal): ?>
            <h4>
                <?=$soal->id . "). " . $soal->pertanyaan?>
            </h4>
            <?php if ($soal->jawaban != ""): // multiple choices 
                $jawaban = $soal->getPelatihanKuesionerKepuasans()->where(['peserta_id' => $peserta->id, 'jenis_id' => $pelatihan_soal_jenis->id])->one(); ?>
                <?= "<input type='hidden' name='soal_id[$soal->id]' id='soal-id-$soal->id' value='$soal->id'>" ?>
                <?php foreach (explode('|', $soal->jawaban) as $pilihanindex => $pilihan): ?>
                    <div class="form-group">
                        <input type="Radio" name="jawaban[<?=$soal->id?>]" id="soal-jawaban-<?=$soal->id?>-<?=$pilihanindex?>"
                            value="<?=$pilihan?>" <?=($jawaban->jawaban == $pilihan) ? "checked" : ""?>>
                        <label class="form-check-label" for="soal-<?=$soal->id?>">
                            <?=$pilihan?>
                        </label>
                    </div>
                    <?php endforeach?>

            <?php else: // essay
                    $jawaban = $soal->getPelatihanKuesionerKepuasans()->where(['peserta_id' => $peserta->id, 'jenis_id' => $pelatihan_soal_jenis->id])->one(); ?>
                <div class="form-group">
                    <input type="hidden" name="soal_id[<?=$soal->id?>]" id="soal-id-<?=$soal->id?>" value="<?=$soal->id?>">
                    <textarea name="jawaban[<?=$soal->id?>]" id="soal-<?=$soal->id?>" cols="30" rows="10" class="form-control"
                        placeholder="Jawaban Anda"><?=$jawaban->jawaban?></textarea>
                </div>
            <?php endif ?>
        <?php endforeach?>
    </form>
    <?php
    if ($current_page > 1): ?>
    <a class="btn btn-default btn-flat" href="#" onclick="handleChangeSoal(this)"
        data-soal="<?=$current_page-1?>">Kembali</a>
    <?php endif?>
    <?php if ($current_page < $total_page): ?>
    <a class="btn btn-default btn-flat" href="#" onclick="handleChangeSoal(this)"
        data-soal="<?=$current_page+1?>">Selanjutnya</a>
    <?php endif?>
    <?php if ($current_page == $total_page): ?>
    <!-- ;window.location = '<?=Url::to(["detail-pelatihan/$model->unique_id"])?>' -->
    <a class="btn btn-default btn-flat" href="#" onclick="event.preventDefault();selesai()">Selesai</a>
    <?php endif?>
</div>