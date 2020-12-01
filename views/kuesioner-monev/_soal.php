<div class="box-header">
    <h4>
        <?=$soal->id . "). " . $soal->pertanyaan?>
    </h4>
</div>
<div class="box-body">
    <form id="form-soal">

        <?php 
        // multiple choices

        use yii\helpers\Url;
    if ($soal->jawaban != ""): ?>
        <input type="hidden" name="soal_id" id="soal-id-<?= $soal->id ?>" value="<?=$soal->id?>">
        <input type="hidden" name="pelatihan_id" id="pelatihan-id-<?= $model->unique_id ?>" value="<?=$model->unique_id?>">
        <?php foreach (explode('|', $soal->jawaban) as $pilihan): ?>
        <div class="form-group">
            <input type="Radio" name="jawaban" id="soal-jawaban-<?= $soal->id ?>" value="<?=$pilihan?>" <?= ($jawaban->jawaban == $pilihan) ? "checked" : "" ?>>
            <label class="form-check-label" for="soal-<?= $soal->id ?>">
                <?=$pilihan?>
            </label>
        </div>
        <?php endforeach?>

        <?php
        // essay
        else: ?>
        <div class="form-group">
            <input type="hidden" name="soal_id" id="soal-id-<?= $soal->id ?>" value="<?=$soal->id?>">

        <input type="hidden" name="pelatihan_id" id="pelatihan-id-<?= $model->unique_id ?>" value="<?=$model->unique_id?>">
            <textarea name="jawaban" id="soal-<?= $soal->id ?>" cols="30" rows="10" class="form-control"
                placeholder="Jawaban Anda"><?= $jawaban->jawaban ?></textarea>
        </div>

        <?php endif?>
    </form>
    <?php 
    if($soal->id > 1): ?>
    <a class="btn btn-default btn-flat" href="#" onclick="handleChangeSoal(this)"
        data-soal="<?= $soal->id-2 ?>">Kembali</a>
    <?php endif ?>
    <?php
    if($soal->id < $total_soal): ?>
    <a class="btn btn-default btn-flat" href="#" onclick="handleChangeSoal(this)"
        data-soal="<?= $soal->id ?>">Selanjutnya</a>
    <?php endif ?>
    <?php
    if($soal->id == $total_soal): ?>
    <!-- ;window.location = '<?= Url::to(["detail-pelatihan/$model->unique_id"]) ?>' -->
    <a class="btn btn-default btn-flat" href="#" onclick="event.preventDefault();selesai()">Selesai</a>
    <?php endif ?>
</div>