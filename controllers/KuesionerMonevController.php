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
        return $this->redirect(['/pelatihan/detail', 'unique_id' => $unique_id]);
    }
    
    public function actionPostAnswer()
    {
        $user = Yii::$app->user->identity;
        $pelatihan_id = $_POST['pelatihan_id'];
        $jawabans = $_POST['jawaban'];

        $flag = 1;
        $transaction = Yii::$app->db->beginTransaction();
        if (count($jawabans)) {
            foreach ($jawabans as $soal_id => $jawaban) {

                if (($user && $soal_id && $pelatihan_id) == false) {
                    $flag = 0;
                }

                $soal = MasterKuesionerMonev::findOne(['id' => (int) $soal_id]);
                if ($soal == []) {
                    $flag = 0;
                }

                $pelatihan = Pelatihan::findOne(['unique_id' => $pelatihan_id]);
                if ($pelatihan == []) {
                    $flag = 0;
                }

                $peserta = PelatihanPeserta::findOne(['pelatihan_id' => $pelatihan->id, 'user_id' => $user->id]);
                if ($peserta == []) {
                    $flag = 0;
                }

                $pelatihan_jenis = PelatihanSoalJenis::findOne(['pelatihan_id' => $pelatihan->id, 'jenis_id' => Constant::SOAL_JENIS_KUESIONER_MONEV]);
                if ($pelatihan_jenis == []) {
                    $flag = 0;
                }

                $jawaban_kuisioner = PelatihanKuesionerMonev::findOne(['jenis_id' => $pelatihan_jenis->id, 'peserta_id' => $peserta->id, 'soal' => $soal->id]);
                if ($jawaban_kuisioner == []) {
                    $jawaban_kuisioner = new PelatihanKuesionerMonev();
                    $jawaban_kuisioner->jenis_id = $pelatihan_jenis->id;
                    $jawaban_kuisioner->peserta_id = $peserta->id;
                    $jawaban_kuisioner->soal = $soal->id;
                }

                $jawaban_kuisioner->jawaban = $jawaban;

                $jawaban_kuisioner->save();
            }

            if ($flag == 0) {
                $transaction->rollBack();
                return $this->renderPartial('not-found');
            }
            $transaction->commit();
            return "saved";
        }
    }

    public function actionRequestSoal($id, $unique_id)
    {
        $user = Yii::$app->user->identity;
        $pelatihan_unique_id = $unique_id;
        if ($id == null || $user == null) {
            return $this->renderPartial('not-found');
        }

        $pelatihan = Pelatihan::findOne(['unique_id' => $pelatihan_unique_id]);
        $peserta = PelatihanPeserta::findOne(['user_id' => $user->id, 'pelatihan_id' => $pelatihan->id]);
        if ($peserta == null) {
            return $this->renderPartial('not-found');
        }

        $pelatihan_soal_jenis = PelatihanSoalJenis::findOne(['pelatihan_id' => $pelatihan->id, 'jenis_id' => Constant::SOAL_JENIS_KUESIONER_MONEV]);

        $total_soal = MasterKuesionerMonev::find()->count();
        $total_page = ceil($total_soal / Constant::LIMIT_SOAL);
        $current_number = ($id * Constant::LIMIT_SOAL) - Constant::LIMIT_SOAL;
        $current_page = ceil($current_number / Constant::LIMIT_SOAL) + 1;

        $pelatihan_soal = MasterKuesionerMonev::find()->offset($current_number)->limit(Constant::LIMIT_SOAL)->all();
        $list_soal = [];
        foreach ($pelatihan_soal as $data) {
            array_push($list_soal, $data->id);
        }

        return $this->renderPartial('_soal.php', [
            'soals' => $pelatihan_soal,
            'total_soal' => $total_soal,
            'model' => $pelatihan,
            'peserta' => $peserta,
            'pelatihan_soal_jenis' => $pelatihan_soal_jenis,
            'current_page' => $current_page,
            'current_number' => $current_number,
            'total_page' => $total_page,
            'total_soal' => $total_soal,
        ]);
    }

    public function actionIndex($unique_id = null)
    {
        $this->layout = '../layouts-peserta/not-found';
        if ($unique_id == null) {
            return $this->render('not-found');
        }

        $model = Pelatihan::find()->where(['unique_id' => $unique_id])->one();
        if ($model == []) {
            return $this->render('not-found');
        }

        $total_soal = MasterKuesionerMonev::find()->count();
        $total_page = ceil($total_soal / Constant::LIMIT_SOAL);
        for ($i = 1; $i <= $total_page; $i++) {
            array_push($this->list_id_soal, $i);
        }

        $this->layout = '../layouts-peserta/main';
        return $this->render('template-soal', [
            'model' => $model,
        ]);
    }
}