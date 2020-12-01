<?php
namespace app\controllers;

use app\components\Constant;
use app\components\RoleType;
use app\models\PelatihanKuesionerMonev;
use app\models\PelatihanSoalJenis;
use app\models\PelatihanSoalPeserta;
use app\models\PelatihanPeserta;
use app\models\LoginPesertaForm;
use app\models\MasterKuesionerMonev;
use app\models\Pelatihan;
use app\models\PelatihanSoal;
use app\models\PelatihanSoalPesertaJawaban;
use DateTime;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;
use yii\data\ActiveDataProvider;

class KuesionerMonevController extends Controller {
    // public function 
    public $list_id_soal = [];

    public function actionFinish(){
        $unique_id = $_POST['pelatihan_id'];
        // $this->selesai($unique_id);
        return $this->redirect(['/pelatihan']);
    }
    
    public function actionPostAnswer(){
        $user = Yii::$app->user->identity;
        $soal_id = $_POST['soal_id'];
        $pelatihan_id = $_POST['pelatihan_id'];
        $jawaban = $_POST['jawaban'];
        
        if(($user && $soal_id && $pelatihan_id) == false) return $this->renderPartial('not-found');

        $soal = MasterKuesionerMonev::findOne(['id' => (int)$soal_id]);
        if($soal == []) return $this->renderPartial('not-found');
        $pelatihan = Pelatihan::findOne(['unique_id' => $pelatihan_id]);
        if($pelatihan == []) return $this->renderPartial('not-found');
        $peserta = PelatihanPeserta::findOne(['pelatihan_id' => $pelatihan->id, 'user_id' => $user->id]);
        if($peserta == []) return $this->renderPartial('not-found');
        $pelatihan_jenis = PelatihanSoalJenis::findOne(['pelatihan_id' => $pelatihan->id, 'jenis_id' => Constant::SOAL_JENIS_KUESIONER_MONEV]);
        if($pelatihan_jenis == []) return $this->renderPartial('not-found');
        
        $jawaban_kuisioner = PelatihanKuesionerMonev::findOne(['jenis_id' => $pelatihan_jenis->id, 'peserta_id' => $peserta->id, 'soal' => $soal->id]);
        if($jawaban_kuisioner == []){
            $jawaban_kuisioner = new PelatihanKuesionerMonev();
            $jawaban_kuisioner->jenis_id = $pelatihan_jenis->id;
            $jawaban_kuisioner->peserta_id = $peserta->id;
            $jawaban_kuisioner->soal = $soal->id;
        }
        
        $jawaban_kuisioner->jawaban = $jawaban;
        
        $jawaban_kuisioner->save();
    }

    public function actionRequestSoal($id, $unique_id){
        $user = Yii::$app->user->identity;
        $pelatihan_unique_id = $unique_id;
        if($id == null || $user == null) return $this->renderPartial('not-found');

        $pelatihan = Pelatihan::findOne(['unique_id' => $pelatihan_unique_id]);
        $peserta = PelatihanPeserta::findOne(['user_id' => $user->id, 'pelatihan_id' => $pelatihan->id]);
        if($peserta == null) return $this->renderPartial('not-found');
        $pelatihan_soal_jenis = PelatihanSoalJenis::findOne(['pelatihan_id' => $pelatihan->id, 'jenis_id' => Constant::SOAL_JENIS_KUESIONER_MONEV]);
        $pelatihan_soal = MasterKuesionerMonev::findOne(['id' => $id]);
        $jawaban = PelatihanKuesionerMonev::findOne(['peserta_id' => $peserta->id, "jenis_id" => $pelatihan_soal_jenis->id, 'soal' => $pelatihan_soal->id]);
        $total_soal = MasterKuesionerMonev::find()->count();
        return $this->renderPartial('_soal.php',[
            'soal' => $pelatihan_soal,
            'total_soal' => $total_soal,
            'model' => $pelatihan,
            'jawaban' => $jawaban,
        ]);
    }

    public function actionIndex($unique_id = null){
        $this->layout  =  '../layouts-peserta/not-found';
        if($unique_id == null) return $this->render('not-found');
        $model = Pelatihan::find()->where(['unique_id' => $unique_id])->one();
        if($model == [])  return $this->render('not-found');
        $user = \Yii::$app->user->identity;
        $model_jenis_soal = $model->getPelatihanSoalJenis()->where(['jenis_id' => Constant::SOAL_JENIS_KUESIONER_MONEV])->one();
        $soals = MasterKuesionerMonev::find()->all();
        
        foreach($soals as $soal){
            array_push($this->list_id_soal, $soal->id);
        }
        
        $this->layout  =  '../layouts-peserta/main';
        return $this->render('template-soal',[
            'soals' => $soals,
            'model' => $model,
        ]);
    }
}