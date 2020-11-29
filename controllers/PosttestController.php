<?php
namespace app\controllers;

use app\models\PelatihanSoalPeserta;
use app\models\PelatihanPeserta;
use app\models\LoginPesertaForm;
use app\models\Pelatihan;
use app\models\PelatihanSoal;
use DateTime;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class PosttestController extends Controller {
    // public function 


    public function actionIndex($unique_id = null){
        $this->layout  =  '../layouts-peserta/not-found';
        if($unique_id == null) return $this->render('not-found');
        $model = Pelatihan::find()->where(['unique_id' => $unique_id])->one();
        if($model == [])  return $this->render('not-found');
        $user = \Yii::$app->user->identity;
        $model_jenis_soal = $model->getPelatihanSoalJenis()->where(['jenis_id' => 2])->one();
        if($model_jenis_soal == []) return $this->render('not-found',[
            'error' => 'Soal belum tersedia'
        ]);
        if(!isset($user)) return $this->redirect(['/site/login']);
        $model_peserta = PelatihanPeserta::find()->where(['pelatihan_id' => $model->id, "user_id" => $user])->one();
        if($model_peserta == [])  return $this->render('not-found', [
            'error' => "Anda tidak terdaftar pada pelatihan ini"
        ]);

        $pelatihan_soal_peserta = PelatihanSoalPeserta::findOne(['jenis_soal' => $model_jenis_soal->id, 'peserta_id' => $model_peserta->id]);
        
        if($pelatihan_soal_peserta == null){
            if($_POST){
                $minutesToAdd = $model_jenis_soal->waktu_pengerjaan;
                $pelatihan_soal_peserta = new PelatihanSoalPeserta();
                $pelatihan_soal_peserta->peserta_id = $model_peserta->id;
                $pelatihan_soal_peserta->jenis_soal = $model_jenis_soal->id;
                $pelatihan_soal_peserta->waktu_mulai = date("Y-m-d H:i:s");
                $pelatihan_soal_peserta->waktu_selesai = date("Y-m-d H:i:s", strtotime("{$pelatihan_soal_peserta->waktu_mulai} + {$minutesToAdd} minute"));
                if(!$pelatihan_soal_peserta->validate()) {
                    return $this->render('not-found', [
                        'error' => "Telah terjadi kesalahan"
                    ]);
                }
                $pelatihan_soal_peserta->save();
            }else{
                return $this->render('not-found', [
                    'error' => "Forbidden Access"
                ]);
            }
        }

        // check apakah waktu masih tersisa atau tidak 
        $waktu_sekarang = strtotime(date("Y-m-d H:i:s"));
        if($waktu_sekarang > strtotime($pelatihan_soal_peserta->waktu_selesai)) return $this->render('not-found', [
            'error' => "Anda telah kehabisan waktu"
        ]);

        $soals = $model_jenis_soal->getPelatihanSoals()->all();
        $this->layout  =  '../layouts-peserta/main';
        return $this->render('template-soal',[
            'soals' => $soals,
            'model' => $model,
            'pelatihan_soal_peserta' => $pelatihan_soal_peserta,
        ]);
    }
}