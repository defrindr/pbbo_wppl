<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$namaChart = "pelatihan-tingkat";
$judulChart = "Tingkat Pelatihan";

?>
<div class="card card-danger">
    <div class="card-header with-border">
        <h3 class="card-title"><?= $judulChart ?></h3>
    </div>
    <div class='card-body'>
        <canvas id="<?= $namaChart ?>"></canvas>
    </div>
</div>

<?php
$script = " 
$(document).ready(function() { 
    $.ajax({
        url: '" . Url::base(true) . "/chart/$namaChart',
        method: 'GET',
        success: function(res) {
            var colorscheme = [
                '#e53935','#8E24AA','#3949AB','#039BE5','#00897B',
                '#7CB342','#FB8C00','#F4511E','#D81B60','#5E35B1',
                '#1E88E5','#00ACC1','#43A047','#C0CA33','#FFB300',
            ]
            new Chart(document.getElementById('$namaChart').getContext('2d'), {
                type: 'pie',
                data: {
                    datasets: [{
                        fill: true,
                        backgroundColor: colorscheme,
                        data: res.data.value
                    }], 
                    labels: res.data.label
                }, 
            });
        }
    });
}); 
";


$this->registerJs($script);
