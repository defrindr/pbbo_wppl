<?php

$this->title = (strpos($model->nama, "latihan") ? $model->nama : "Pelatihan {$model->nama}");
$this->registerJs('
// Set the date we re counting down to
var countDownDate = new Date("'. $pelatihan_soal_peserta->waktu_selesai. '").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="countdown"
  let template = "";
  if(days !== 0) template += days + "d ";
  if(hours !== 0) template += hours + "h ";
  if(minutes !== 0) template += minutes + "m ";
  if(seconds !== 0) template += seconds + "s ";
  document.getElementById("countdown").innerHTML = template;

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "EXPIRED";
  }
}, 1000);');
?>
<div class="mt-5">
    <form action="<?= \yii\helpers\Url::to(["/pretest/finish/$model->unique_id"]) ?>" method="post">
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
                        <textarea name="<?= $soal->id ?>" id="soal-<?= $soal->id ?>" cols="30" rows="10" class="form-control" placeholder="Jawaban Anda"></textarea>
                    </div>
                </div>
                
            <?php elseif($soal->kategori_soal_id == 3): // short answer ?>
                <?php foreach($soal->pelatihanSoalPilihans as $pilihan) : ?>
                <div class="form-group">
                    <div class="col-sm-6">
                        <input type="text" name="<?= $soal->id ?>" id="soal-<?= $soal->id ?>" value="" class="form-control" placeholder="Jawaban Anda">
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
    <button class="btn btn-primary" name="finish">
        Selesai
    </button>
    </form>
</div>