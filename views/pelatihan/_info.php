<?php

use app\components\RoleType;

$colomn_2 = [
    'template' => '
    <div class="col-lg-12">
        <div class="col-md-4"><label class="control-label">{labelTitle}</label></div>
        <div class="col-md-8">{input}</div>
        <div class="col-md-12">{error}</div>
    </div>
        ',
    'options'=>['class'=>'col-md-6', 'style'=>'padding:0px;']
];

?>

			<?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display: none']) ?>
            <?= $form->field($model, 'nama', $colomn_2)->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'tanggal_mulai', $colomn_2)->widget(
                \kartik\date\DatePicker::className(),
                [
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]
            ) ?>
			<?= $form->field($model, 'tanggal_selesai', $colomn_2)->widget(
                \kartik\date\DatePicker::className(),
                [
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ]
            ) ?>
            <?= $form->field($model, 'kriteria', $colomn_2)->textInput() ?>
			<?= $form->field($model, 'latar_belakang', $colomn_2)->textarea(['rows' => 6]) ?>
			<?= $form->field($model, 'tujuan', $colomn_2)->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'jumlah_target', $colomn_2)->textInput(['type' => 'number', 'min' => 1]) ?>
            <?= $form->field($model, 'sasaran_wilayah', $colomn_2)->textInput() ?>
            <?php
            // $form->field($model, 'tingkat_id')->dropDownList(
            //     \yii\helpers\ArrayHelper::map(app\models\PelatihanTingkat::find()->all(), 'id', 'nama'),
            //     [
            //         'prompt' => 'Select',
            //         'disabled' => (isset($relAttributes) && isset($relAttributes['tingkat_id'])),
            //     ]
            // );
            ?>
            
            <?= $form->field($model, 'lokasi', $colomn_2)->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'kota', $colomn_2)->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'nama_penandatangan', $colomn_2)->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'nip_penandatangan', $colomn_2)->textInput(['maxlength' => true]) ?> 
            <?= $form->field($model, 'forum_diskusi', $colomn_2)->textInput(['maxlength' => true]) ?>

            <?php
            if (Yii::$app->user->identity->role_id == RoleType::SA) :
                echo $form->field($model, 'pelaksana_id', $colomn_2)->dropDownList(
                    \yii\helpers\ArrayHelper::map(app\models\User::find()->where([
                        '!=', 'role_id', 3 // role peserta
                    ])->all(), 'id', 'name'),
                    [
                        'prompt' => 'Select',
                        'disabled' => (isset($relAttributes) && isset($relAttributes['pelaksana_id'])),
                    ]
                );
            endif;
            ?>