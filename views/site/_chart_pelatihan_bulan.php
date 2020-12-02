<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$namaChart = "pelatihan-bulan";
$judulChart = "Jumlah Pelatihan perbulan Tahun " . date('Y');

?>
<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title"><?= $judulChart ?></h3>
    </div>
    <div class='box-body'>
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
                type: 'bar',
                data: {
                    datasets: [{
                        label: 'Total Keseluruhan',
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
