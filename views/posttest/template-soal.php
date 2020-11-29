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
    alert("Anda Kehabisan Waktu");
    location.reload();
    document.getElementById("countdown").innerHTML = "EXPIRED";
  }
}, 1000);

let list_id_soal = '. json_encode($this->context->list_id_soal). ';

$(document).ready(function(){
    requestSoal(list_id_soal[0].unique_id);
});

function handleChangeSoal(ev){
    let index = $(ev).data("soal");
    updateJawaban();
    requestSoal(list_id_soal[index].unique_id);
}

const requestSoal = (unique) => {
    let container = document.querySelector("#soal-container");
    fetch("'. \yii\helpers\Url::to(['/posttest/request-soal/']).'/"+unique).then(response => response.text()).then(response => {
        container.innerHTML = response;
    });
}

const updateJawaban = () => {
    $.ajax({
        url: "'. \yii\helpers\Url::to(['posttest/post-answer']). '",
        method: "POST",
        data: $("#form-soal").serialize()
    });
}

', yii\web\View::POS_END, "loadSoal");
?>

<div class="mt-5">
    <div class="container box box-primary mt-2" id="soal-container">
    </div>
</div>