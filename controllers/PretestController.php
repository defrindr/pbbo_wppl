<?php
namespace app\controllers;

use app\models\PelatihanPeserta;
use app\models\LoginPesertaForm;
use app\models\Pelatihan;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PretestController extends Controller {
    // public function 

    public function actionIndex($unique_id = null){
        $this->layout  =  '../layouts-peserta/not-found';
        if($unique_id == null) return $this->render('not-found');
        $model = Pelatihan::find()->where(['unique_id' => $unique_id])->one();
        if($model == [])  return $this->render('not-found');
        $user_session = \Yii::$app->user->identity;
        if(!$user_session) return $this->redirect(['/site/login']);
        $jenis_soal = $model->getPelatihanSoalJenis()->where(['jenis_id' => 1])->one();
        if($jenis_soal == []) return $this->render('not-found',[
            'error' => 'Soal belum tersedia'
        ]);
        $soals = $jenis_soal->getPelatihanSoals()->all();

        $this->layout  =  '../layouts-peserta/main';
        return $this->render('template-soal',[
            'soals' => $soals,
            'model' => $model,
        ]);
    }
}