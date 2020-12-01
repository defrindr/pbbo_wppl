<?php

$this->title = (strpos($model->nama, "latihan") ? $model->nama : "Pelatihan {$model->nama}");

$this->registerJs('
let list_id_soal = '. json_encode($this->context->list_id_soal). ';
let unique_id = "'. $model->unique_id. '";

$(document).ready(function(){
    requestSoal(list_id_soal[0]);
});

function handleChangeSoal(ev){
    let index = $(ev).data("soal");
    updateJawaban();
    requestSoal(list_id_soal[index]);
}

const requestSoal = (unique) => {
    let container = document.querySelector("#soal-container");
    fetch("'. \yii\helpers\Url::to(['/kuesioner-kepuasan/request-soal/']).'/"+unique+"/"+unique_id).then(response => response.text()).then(response => {
        container.innerHTML = response;
    });
}

const updateJawaban = () => {
    data = $("#form-soal").serialize();
    console.log(data == "")
    if(data == ""){
        data = "pelatihan_id="+unique_id;
    }
    console.log(data)
    $.ajax({
        url: "'. \yii\helpers\Url::to(['kuesioner-kepuasan/post-answer']). '",
        method: "POST",
        data: data
    });
}

const selesai = () => {
    updateJawaban();
    $.ajax({
        url: "'. \yii\helpers\Url::to(['kuesioner-kepuasan/finish']). '",
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
            $i = 0;
            foreach($this->context->list_id_soal as $soal): ?>
            <a class="btn btn-default" href="#" onclick="handleChangeSoal(this)" data-soal="<?= $i ?>"><?= $i+1 ?></a>
            <?php
            $i++;
            endforeach ?>
        </div>
</div>