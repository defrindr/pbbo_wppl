<?php
namespace app\controllers;

use app\models\Pelatihan;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PosttestController extends Controller {
    // public function 

    public function actionIndex($unique_id = null){
        $this->layout  =  '../layouts-peserta/not-found';
        if($unique_id == null) return $this->render('not-found');
        $model = Pelatihan::find()->where(['unique_id' => $unique_id])->one();
        if($model == [])  return $this->render('not-found');

        $this->layout  =  '../layouts-peserta/main';
        $jenis_soal = $model->getPelatihanSoalJenis()->where(['jenis_id' => 1])->one();
        $soals = $jenis_soal->getPelatihanSoals()->all();

        return $this->render('template-soal',[
            'soals' => $soals,
            'model' => $model,
        ]);
    }
}