<?php

$this->title = (strpos($model->nama, "latihan") ? $model->nama : "Pelatihan {$model->nama}");

$this->registerJs('
var countDownDate = new Date("'. $pelatihan_soal_peserta->waktu_selesai. '").getTime();
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

  let template = "";
  if(days !== 0) template += days + "d ";
  if(hours !== 0) template += hours + "h ";
  if(minutes !== 0) template += minutes + "m ";
  if(seconds !== 0) template += seconds + "s ";
  document.getElementById("countdown").innerHTML = template;

  if (distance < 0) {
    clearInterval(x);
    alert("Anda Kehabisan Waktu");
    location.reload();
    document.getElementById("countdown").innerHTML = "EXPIRED";
  }
}, 1000);');
$this->registerJs('
let unique_id = "'. $model->unique_id. '";

$(document).ready(function(){
    requestSoal(1);
});

function handleChangeSoal(ev){
    let index = $(ev).data("soal");
    updateJawaban();
    requestSoal(index);
}

const requestSoal = (unique) => {
    let container = document.querySelector("#soal-container");
    fetch("'. \yii\helpers\Url::to(['/pretest/request-soal/']).'/"+unique+"/"+unique_id).then(response => response.text()).then(response => {
        container.innerHTML = response;
    });
}

const updateJawaban = () => {
    data = $("#form-soal").serialize();
    if(data == ""){
        data = "pelatihan_id="+unique_id;
    }
    $.ajax({
        url: "'. \yii\helpers\Url::to(['pretest/post-answer']). '",
        method: "POST",
        data: data
    });
}

const selesai = () => {
    updateJawaban();
    $.ajax({
        url: "'. \yii\helpers\Url::to(['pretest/finish']). '",
        method: "POST",
        data: $("#form-soal").serialize()
    });
}

', yii\web\View::POS_END, "loadSoal");
?>

<div class="mt-5">
    <div class="container box box-primary mt-2" id="soal-container">
    </div>
        <div class="btn-group" style="margin: 4rem;" role="group" aria-label="First group">
            <?php 
            foreach($this->context->list_id_soal as $soal): ?>
            <a class="btn btn-default" href="#" onclick="handleChangeSoal(this)" data-soal="<?= $soal ?>"><?= $soal ?></a>
            <?php endforeach ?>
        </div>
</div>