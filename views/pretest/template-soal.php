<?php

$this->title = (strpos($model->nama, "latihan") ? $model->nama : "Pelatihan {$model->nama}");
?>
<div class="mt-5">
    <?php 
    $i =1;
    foreach($soals as $soal): ?>
    <div class="container box box-primary mt-2">
        <div class="box-header">
            <h4>
                <?= $i ."). ". $soal->soal ?>
            </h4>
        </div>
        <div class="box-body">
            <?php if($soal->kategori_soal_id == 1): // multiple choices ?>
                <?php foreach($soal->pelatihanSoalPilihans as $pilihan) : ?>
                <div class="form-group">
                    <input type="Radio" name="<?= $soal->id ?>" id="soal-<?= $soal->id ?>" value="<?= $pilihan->pilihan ?>">
                    <label class="form-check-label" for="soal-<?= $soal->id ?>">
                        <?= $pilihan->pilihan ?>
                    </label>
                    </div>
                <?php endforeach ?>
                
            <?php elseif($soal->kategori_soal_id == 2):  // essay?>
                <div class="form-group">
                    <div class="col-sm-6">
                        <textarea name="<?= $soal->id ?>" id="soal-<?= $soal->id ?>" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                
            <?php elseif($soal->kategori_soal_id == 3): // short answer ?>
                <?php foreach($soal->pelatihanSoalPilihans as $pilihan) : ?>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="text" name="<?= $soal->id ?>" id="soal-<?= $soal->id ?>" value="" class="form-control">
                    </div>
                <?php endforeach ?>
                
            <?php elseif($soal->kategori_soal_id == 4): // checkbox?>
                <?php foreach($soal->pelatihanSoalPilihans as $pilihan) : ?>
                <div class="form-group">
                    <input type="checkbox" name="<?= $soal->id ?>[]" id="soal-<?= $soal->id ?>" value="<?= $pilihan->pilihan ?>">
                    <label class="form-check-label" for="soal-<?= $soal->id ?>">
                        <?= $pilihan->pilihan ?>
                    </label>
                    </div>
                <?php endforeach ?>
                
            <?php endif ?>
            <?php $i++ ?>
        </div>
    </div>
    <?php endforeach ?>
</div>