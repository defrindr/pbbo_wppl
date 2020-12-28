<?php
namespace app\controllers;

use app\components\Constant;
use app\models\Pelatihan;
use app\models\PelatihanPeserta;
use app\models\PelatihanSoal;
use app\models\PelatihanSoalJenis;
use app\models\PelatihanSoalPeserta;
use app\models\PelatihanSoalPesertaJawaban;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PretestController extends Controller
{
    public $list_id_soal = [];

    private function selesai($unique_id)
    {
        $user = Yii::$app->user->identity;

        $pelatihan = Pelatihan::findOne(['unique_id' => $unique_id]);
        if ($pelatihan == null) {
            throw new NotFoundHttpException();
        }

        $peserta = PelatihanPeserta::findOne(['pelatihan_id' => $pelatihan->id, 'user_id' => $user->id]);
        if ($peserta == null) {
            throw new NotFoundHttpException();
        }

        $pelatihan_jenis_soal = PelatihanSoalJenis::findOne(['pelatihan_id' => $pelatihan->id, 'jenis_id' => Constant::SOAL_JENIS_PRETEST]);
        if ($pelatihan_jenis_soal == null) {
            throw new NotFoundHttpException();
        }

        $soal_peserta = PelatihanSoalPeserta::findOne(['jenis_soal' => $pelatihan_jenis_soal->id, 'peserta_id' => $peserta->id]);
        if ($soal_peserta == null) {
            throw new NotFoundHttpException();
        }

        $pelatihan_soals = PelatihanSoal::find()->where(['jenis_id' => $pelatihan_jenis_soal->id])->all();
        $total_soal = PelatihanSoal::find()->where(['jenis_id' => $pelatihan_jenis_soal->id])->count();
        $jumlah_benar = 0;
        foreach ($pelatihan_soals as $soal) {
            $jawaban = PelatihanSoalPesertaJawaban::findOne(['soal_id' => $soal->id, 'peserta_id' => $soal_peserta->id]);
            if ($soal->jawaban == $jawaban->jawaban) {
                $jumlah_benar++;
            }

        }

        $nilai_akhir = 100 * ($jumlah_benar / $total_soal);
        $peserta->nilai_pretest = $nilai_akhir;
        $soal_peserta->selesai = 1;

        $peserta->save();
        $soal_peserta->save();
    }

    public function actionFinish()
    {
        $unique_id = $_POST['pelatihan_id'];
        $this->selesai($unique_id);
        return $this->redirect(['/pelatihan/detail', 'unique_id' => $unique_id]);
    }

    public function actionPostAnswer()
    {
        $user = Yii::$app->user->identity;
        $pelatihan_unique_id = $_POST['pelatihan_id'];
        $jawabans = $_POST['jawaban'];

        $flag = 1;
        $transaction = Yii::$app->db->beginTransaction();
        if (count($jawabans) > 0) {
            foreach ($jawabans as $unique_id => $jawaban) {
                if (strtolower(gettype($jawaban)) == "array") {
                    $jawaban = implode("|", $jawaban);
                }

                if (($unique_id && $user) == false) {
                    $flag = 0;
                }

                $pelatihan_soal = PelatihanSoal::findOne(['unique_id' => $unique_id]);
                if ($pelatihan_soal == null) {
                    $flag = 0;
                }

                $pelatihan_soal_jenis = PelatihanSoalJenis::findOne(['id' => $pelatihan_soal->jenis_id, 'jenis_id' => Constant::SOAL_JENIS_PRETEST]);
                if ($pelatihan_soal_jenis == null) {
                    $flag = 0;
                }

                $peserta = PelatihanPeserta::findOne(['user_id' => $user->id, 'pelatihan_id' => $pelatihan_soal_jenis->pelatihan_id]);
                if ($peserta == null) {
                    $flag = 0;
                }

                $soal_peserta = PelatihanSoalPeserta::findOne(['jenis_soal' => $pelatihan_soal->jenis_id, 'peserta_id' => $peserta->id]);
                if ($soal_peserta == null) {
                    $flag = 0;
                }else if($soal_peserta->selesai == 1){
                    $flag = 3;
                }

                // check apakah waktu masih tersisa atau tidak
                $waktu_sekarang = strtotime(date("Y-m-d H:i:s"));
                if ($waktu_sekarang > strtotime($soal_peserta->waktu_selesai)) {
                    $flag = 2;
                }

                $soal_jawaban_peserta = PelatihanSoalPesertaJawaban::findOne(['peserta_id' => $soal_peserta->id, 'soal_id' => $pelatihan_soal->id]);
                if ($soal_jawaban_peserta == null) {
                    $soal_jawaban_peserta = new PelatihanSoalPesertaJawaban();
                    $soal_jawaban_peserta->peserta_id = $soal_peserta->id;
                    $soal_jawaban_peserta->soal_id = $pelatihan_soal->id;
                }

                $soal_jawaban_peserta->jawaban = $jawaban;
                $soal_jawaban_peserta->save();
            }

            if ($flag == 0) {
                $transaction->rollBack();
                return $this->renderPartial('not-found');
            }

            if ($flag == 2) { // waktu habis
                $transaction->commit();
                $this->selesai($pelatihan_unique_id);
                return $this->render('not-found', [
                    'error' => "Anda telah kehabisan waktu",
                ]);
            }

            if ($flag == 3) { // telah selesai
                $transaction->rollBack();
                return $this->renderPartial('not-found', [
                    'error' => "Anda telah menyelesaikan test ini",
                ]);
            }

            $transaction->commit();
            return "saved";
        }
    }

    public function actionRequestSoal($id, $unique_id)
    {
        $user = Yii::$app->user->identity;

        if ($id == null || $user == null) {
            return $this->renderPartial('not-found');
        }

        $pelatihan = Pelatihan::findOne(['unique_id' => $unique_id]);
        if ($pelatihan == []) {
            return $this->renderPartial('not-found');
        }

        $peserta = PelatihanPeserta::findOne(['user_id' => $user->id, 'pelatihan_id' => $pelatihan->id]);
        if ($peserta == null) {
            return $this->renderPartial('not-found');
        }

        $pelatihan_soal_jenis = PelatihanSoalJenis::findOne(['pelatihan_id' => $pelatihan->id, 'jenis_id' => Constant::SOAL_JENIS_PRETEST]);
        if ($pelatihan_soal_jenis == null) {
            return $this->renderPartial('not-found');
        }

        $soal_peserta = PelatihanSoalPeserta::findOne(['jenis_soal' => $pelatihan_soal_jenis->id, 'peserta_id' => $peserta->id]);
        if ($soal_peserta == null) {
            return $this->renderPartial('not-found');
        }

        $total_soal = $pelatihan_soal_jenis->jumlah_soal;
        $total_page = ceil($total_soal / Constant::LIMIT_SOAL);
        $current_number = ($id * Constant::LIMIT_SOAL) - Constant::LIMIT_SOAL;
        $current_page = ceil($current_number / Constant::LIMIT_SOAL) + 1;

        // check apakah waktu masih tersisa atau tidak
        $waktu_sekarang = strtotime(date("Y-m-d H:i:s"));
        if ($waktu_sekarang > strtotime($soal_peserta->waktu_selesai)) {
            $this->selesai($unique_id);
            return $this->renderPartial('not-found', [
                'error' => "Anda telah kehabisan waktu",
            ]);
        }

        if ($soal_peserta->selesai == 1) {
            return $this->renderPartial('not-found', [
                'error' => "Anda telah menyelesaikan soal ini.",
            ]);
        }

        $pelatihan_soal = PelatihanSoal::find()->where(['jenis_id' => $pelatihan_soal_jenis->id])->limit(Constant::LIMIT_SOAL)->offset($current_number)->all();

        return $this->renderPartial('_soal.php', [
            'soals' => $pelatihan_soal,
            'soal_peserta' => $soal_peserta,
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
        $user = \Yii::$app->user->identity;
        if (!isset($user)) {
            return $this->redirect(['/site/login']);
        }

        if ($unique_id == null) {
            return $this->render('not-found');
        }

        $model = Pelatihan::find()->where(['unique_id' => $unique_id])->one();
        if ($model == []) {
            return $this->render('not-found');
        }

        $model_jenis_soal = $model->getPelatihanSoalJenis()->where(['jenis_id' => Constant::SOAL_JENIS_PRETEST])->one();
        if ($model_jenis_soal == []) {
            return $this->render('not-found', [
                'error' => 'Soal belum tersedia',
            ]);
        }

        $model_peserta = PelatihanPeserta::find()->where(['pelatihan_id' => $model->id, "user_id" => $user->id])->one();
        if ($model_peserta == []) {
            return $this->render('not-found', [
                'error' => "Anda tidak terdaftar pada pelatihan ini",
            ]);
        }

        $pelatihan_soal_peserta = PelatihanSoalPeserta::findOne(['jenis_soal' => $model_jenis_soal->id, 'peserta_id' => $model_peserta->id]);
        if ($pelatihan_soal_peserta == null) {
            if ($_POST) {
                $minutesToAdd = $model_jenis_soal->waktu_pengerjaan;
                $pelatihan_soal_peserta = new PelatihanSoalPeserta();
                $pelatihan_soal_peserta->peserta_id = $model_peserta->id;
                $pelatihan_soal_peserta->jenis_soal = $model_jenis_soal->id;
                $pelatihan_soal_peserta->waktu_mulai = date("Y-m-d H:i:s");
                $pelatihan_soal_peserta->waktu_selesai = date("Y-m-d H:i:s", strtotime("{$pelatihan_soal_peserta->waktu_mulai} + {$minutesToAdd} minute"));
                if (!$pelatihan_soal_peserta->validate()) {
                    return $this->render('not-found', [
                        'error' => "Telah terjadi kesalahan",
                    ]);
                }
                $pelatihan_soal_peserta->save();
            } else {
                return $this->render('not-found', [
                    'error' => "Forbidden Access",
                ]);
            }
        }

        // check apakah waktu masih tersisa atau tidak
        $waktu_sekarang = strtotime(date("Y-m-d H:i:s"));
        if ($waktu_sekarang > strtotime($pelatihan_soal_peserta->waktu_selesai)) {
            return $this->render('not-found', [
                'error' => "Anda telah kehabisan waktu",
            ]);
        }

        if ($pelatihan_soal_peserta->selesai == 1) {
            return $this->render('not-found', [
                'error' => "Anda telah menyelesaikan soal ini.",
            ]);
        }

        $total_soal = $model_jenis_soal->jumlah_soal;
        $total_page = ceil($total_soal / Constant::LIMIT_SOAL);
        for ($i = 1; $i <= $total_page; $i++) {
            array_push($this->list_id_soal, $i);
        }
        $this->layout = '../layouts-peserta/main';
        return $this->render('template-soal', [
            'model' => $model,
            'pelatihan_soal_peserta' => $pelatihan_soal_peserta,
        ]);
    }
}
