<?php
use app\components\RoleType;

?>

			<?=$form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display: none'])?>
			<?=$form->field($model, 'nama')->textInput(['maxlength' => true])?>
			<?=$form->field($model, 'latar_belakang')->textarea(['rows' => 6])?>
			<?=$form->field($model, 'tujuan')->textarea(['rows' => 6])?>
            <?=$form->field($model, 'tanggal_mulai')->widget(\kartik\date\DatePicker::className(),
                [
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ])?>
			<?=$form->field($model, 'tanggal_selesai')->widget(\kartik\date\DatePicker::className(),
                [
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ])?>
            <?=$form->field($model, 'kriteria')->textInput()?>
            <?=$form->field($model, 'jumlah_target')->textInput(['type' => 'number', 'min' => 1])?>
            <?=$form->field($model, 'sasaran_wilayah')->textInput()?>
			<?= $form->field($model, 'tingkat_id')->dropDownList(
                \yii\helpers\ArrayHelper::map(app\models\PelatihanTingkat::find()->all(), 'id', 'nama'),
                [
                    'prompt' => 'Select',
                    'disabled' => (isset($relAttributes) && isset($relAttributes['tingkat_id'])),
                ]
            );?>
            <?=$form->field($model, 'forum_diskusi')->textInput(['maxlength' => true])?>
            
            <?php
            if(Yii::$app->user->identity->role_id == RoleType::SA):
                echo $form->field($model, 'pelaksana_id')->dropDownList(
                    \yii\helpers\ArrayHelper::map(app\models\User::find()->all(), 'id', 'name'),
                    [
                        'prompt' => 'Select',
                        'disabled' => (isset($relAttributes) && isset($relAttributes['pelaksana_id'])),
                    ]
                );
            endif;
            ?>