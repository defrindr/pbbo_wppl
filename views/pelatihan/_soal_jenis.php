<?=$form->field($modelSoalJenis, "jenis_id")->dropdownList(
    \yii\helpers\ArrayHelper::map(app\models\MasterJenisSoal::find()->all(), 'id', 'nama'),
    [
        'prompt' => 'Select',
    ])?>
<?=$form->field($modelSoalJenis, "waktu_pengerjaan")->textInput(['type' => 'number'])?>