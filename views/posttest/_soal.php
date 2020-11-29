<div class="box-header">
    <h4>
        <?=$soal->order . "). " . $soal->soal?>
    </h4>
</div>
<div class="box-body">
    <form id="form-soal">

        <?php 
        // multiple choices

        use yii\helpers\Url;

if ($soal->kategori_soal_id == 1): ?>
        <input type="hidden" name="soal_id" id="soal-id-<?= $soal->unique_id ?>" value="<?=$soal->unique_id?>">
        <?php foreach ($soal->pelatihanSoalPilihans as $pilihan): ?>
        <div class="form-group">
            <input type="Radio" name="jawaban" id="soal-jawaban-<?= $soal->unique_id ?>" value="<?=$pilihan->pilihan?>" <?= ($jawaban->jawaban == $pilihan->pilihan) ? "checked" : "" ?>>
            <label class="form-check-label" for="soal-<?= $soal->unique_id ?>">
                <?=$pilihan->pilihan?>
            </label>
        </div>
        <?php endforeach?>

        <?php
        // essay
        elseif ($soal->kategori_soal_id == 2): ?>
        <div class="form-group">
            <input type="hidden" name="soal_id" id="soal-id-<?= $soal->unique_id ?>" value="<?=$soal->unique_id?>">
            <textarea name="jawaban" id="soal-<?= $soal->unique_id ?>" cols="30" rows="10" class="form-control"
                placeholder="Jawaban Anda"><?= $jawaban->jawaban ?></textarea>
        </div>

        <?php
        // short answer 
        elseif ($soal->kategori_soal_id == 3):?>
        <input type="hidden" name="soal_id" id="soal-id-<?= $soal->unique_id ?>" value="<?=$soal->unique_id?>">
        <?php foreach ($soal->pelatihanSoalPilihans as $pilihan): ?>
        <div class="form-group">
            <input type="text" name="jawaban" id="soal-<?= $soal->unique_id ?>" class="form-control"
                placeholder="Jawaban Anda" value="<?= $jawaban->jawaban ?>">
        </div>
        <?php endforeach?>

        <?php
        // checkbox
        elseif ($soal->kategori_soal_id == 4):?>

        <input type="hidden" name="soal_id" id="soal-id-<?= $soal->unique_id ?>" value="<?=$soal->unique_id?>">
        <?php foreach ($soal->pelatihanSoalPilihans as $pilihan): ?>
        <div class="form-group">
            <input type="checkbox" name="jawaban[]" id="soal-<?= $soal->unique_id ?>" value="<?=$pilihan->pilihan?>" 
            
            <?php foreach(explode("|", $jawaban->jawaban) as $checked): 
                if($checked == $pilihan->pilihan){
                    echo "checked";
                    break;
                } 
            endforeach?>
                >
            <label class="form-check-label" for="soal-<?= $soal->unique_id ?>">
                <?=$pilihan->pilihan?>
            </label>
        </div>
        <?php endforeach?>

        <?php endif?>
    </form>
    <?php 
    if($soal->order > 1): ?>
    <a class="btn btn-default btn-flat" href="#" onclick="handleChangeSoal(this)"
        data-soal="<?= $soal->order-2 ?>">Kembali</a>
    <?php endif ?>
    <?php
    if($soal->order < $total_soal): ?>
    <a class="btn btn-default btn-flat" href="#" onclick="handleChangeSoal(this)"
        data-soal="<?= $soal->order ?>">Selanjutnya</a>
    <?php endif ?>
    <?php
    if($soal->order == $total_soal): ?>
    <a class="btn btn-default btn-flat" href="#" onclick="event.preventDefault();updateJawaban();window.location = '<?= Url::to(["detail-pelatihan/$model->unique_id"]) ?>'">Selesai</a>
    <?php endif ?>
</div>