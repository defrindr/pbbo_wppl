<?php

use app\components\Constant;

$exist = [Constant::SOAL_JENIS_PRAKTEK]; // BY DEFAULT PRAKTEK IS HIDDEN

    $modelCheckExist = app\models\PelatihanSoalJenis::find()->where(['pelatihan_id' => $model->id]);
    
    if($modelSoalJenis->jenis_id != null){
        $modelCheckExist->andWhere(['!=', 'id', $modelSoalJenis->id]);
    }
    
    $modelCheckExist = $modelCheckExist->select('jenis_id')->all();
    foreach($modelCheckExist as $data){
        array_push($exist, $data->jenis_id);
    }
    echo $form->field($modelSoalJenis, "jenis_id")->dropdownList(
    \yii\helpers\ArrayHelper::map(app\models\MasterJenisSoal::find()->where(['not in', 'id', $exist])->all(), 'id', 'nama'),
    [
        'prompt' => 'Select',
    ])?>
<?=$form->field($modelSoalJenis, "waktu_pengerjaan")->textInput(['type' => 'number', 'min' => 5])?>