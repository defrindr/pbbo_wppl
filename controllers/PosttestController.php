<?php
namespace app\controllers;

use app\models\PelatihanSoalJenis;
use app\models\PelatihanSoalPeserta;
use app\models\PelatihanPeserta;
use app\models\LoginPesertaForm;
use app\models\Pelatihan;
use app\models\PelatihanSoal;
use app\models\PelatihanSoalPesertaJawaban;
use DateTime;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;

class PosttestController extends Controller {
    // public function 
    public $list_id_soal;

    public function actionPostAnswer(){
        $user = Yii::$app->user->identity;
        $unique_id = $_POST['soal_id'];
        $jawaban = isset($_POST['jawaban']) ? $_POST['jawaban'] : "";
        if(strtolower(gettype($jawaban)) == "array") $jawaban = implode("|", $jawaban);
        if(($unique_id && $user) == false) return $this->render('not-found');

        $pelatihan_soal = PelatihanSoal::findOne(['unique_id' => $unique_id]);
        if($pelatihan_soal == null) return $this->render('not-found');

        $pelatihan_soal_jenis = PelatihanSoalJenis::findOne(['id' => $pelatihan_soal->jenis_id, 'jenis_id' => 2]);
        if($pelatihan_soal_jenis == null) return $this->render('not-found');

        $peserta = PelatihanPeserta::findOne(['user_id' => $user->id, 'pelatihan_id' => $pelatihan_soal_jenis->pelatihan_id]);
        if($peserta == null) return $this->render('not-found');

        $soal_peserta = PelatihanSoalPeserta::findOne(['jenis_soal' => $pelatihan_soal->jenis_id, 'peserta_id' => $peserta->id]);
        if($soal_peserta == null) return $this->render('not-found');
        
        // check apakah waktu masih tersisa atau tidak 
        $waktu_sekarang = strtotime(date("Y-m-d H:i:s"));
        if($waktu_sekarang > strtotime($soal_peserta->waktu_selesai)) return $this->render('not-found', [
            'error' => "Anda telah kehabisan waktu"
        ]);
        
        $soal_jawaban_peserta = PelatihanSoalPesertaJawaban::findOne(['peserta_id' => $peserta->id, 'soal_id' => $pelatihan_soal->id]);
        if($soal_jawaban_peserta == null){
            $soal_jawaban_peserta = new PelatihanSoalPesertaJawaban();
            $soal_jawaban_peserta->peserta_id = $peserta->id;
            $soal_jawaban_peserta->soal_id = $pelatihan_soal->id;
        }
        
        $soal_jawaban_peserta->jawaban = $jawaban;
        $soal_jawaban_peserta->save();
    }

    public function actionRequestSoal($unique_id){
        $user = Yii::$app->user->identity;
        if($unique_id == null || $user == null) return $this->render('not-found');
        $pelatihan_soal = PelatihanSoal::findOne(['unique_id' => $unique_id]);
        if($pelatihan_soal == null) return $this->render('not-found');
        $pelatihan_soal_jenis = PelatihanSoalJenis::findOne(['id' => $pelatihan_soal->jenis_id, 'jenis_id' => 2]);
        if($pelatihan_soal_jenis == null) return $this->render('not-found');
        $peserta = PelatihanPeserta::findOne(['user_id' => $user->id, 'pelatihan_id' => $pelatihan_soal_jenis->pelatihan_id]);
        if($peserta == null) return $this->render('not-found');
        $soal_peserta = PelatihanSoalPeserta::findOne(['jenis_soal' => $pelatihan_soal->jenis_id, 'peserta_id' => $peserta->id]);
        if($soal_peserta == null) return $this->render('not-found');

        // check apakah waktu masih tersisa atau tidak 
        $waktu_sekarang = strtotime(date("Y-m-d H:i:s"));
        if($waktu_sekarang > strtotime($soal_peserta->waktu_selesai)) return $this->render('not-found', [
            'error' => "Anda telah kehabisan waktu"
        ]);

        $total_soal = PelatihanSoal::find()->where(['jenis_id' => $pelatihan_soal_jenis])->count();
        $this->list_id_soal = $pelatihan_soal_jenis->getPelatihanSoals()->select(['unique_id'])->asArray()->all();
        return $this->renderPartial('_soal.php',[
            'soal' => $pelatihan_soal,
            'total_soal' => $total_soal
        ]);
    }

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
        $this->list_id_soal = $model_jenis_soal->getPelatihanSoals()->select(['unique_id'])->asArray()->all();
        $this->layout  =  '../layouts-peserta/main';
        return $this->render('template-soal',[
            'soals' => $soals,
            'model' => $model,
            'pelatihan_soal_peserta' => $pelatihan_soal_peserta,
        ]);
    }
}