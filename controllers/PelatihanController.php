<?php

namespace app\controllers;

use app\components\Constant;
use app\components\RoleType;
use app\models\base\PelatihanSoalPilihan as BasePelatihanSoalPilihan;
use app\models\base\User;
use app\models\Pelatihan;
use app\models\PelatihanPeserta;
use app\models\PelatihanSoal;
use app\models\PelatihanSoalJenis;
use app\models\PelatihanSoalPilihan;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;

/**
 * This is the class for controller "PelatihanController".
 */
class PelatihanController extends \app\controllers\base\PelatihanController
{

    public function actionDetail($unique_id){
        $model = Pelatihan::findOne(['unique_id' => $unique_id]);
        $waktu_sekarang = strtotime(date('Y-m-d H:i:s'));
        $lebih_tgl_mulai = $waktu_sekarang >= strtotime($model->tanggal_mulai);
        $kurang_tgl_selesai = $waktu_sekarang <= strtotime($model->tanggal_selesai);
        if( ($lebih_tgl_mulai && $kurang_tgl_selesai) == false){
            Yii::$app->session->setFlash('error', 'Pelatihan ini belum mulai / sudah berakhir.');
            return $this->goBack();
        }
        return $this->render('detail',[
            'model' => $model
        ]);
    }

    public function actionAddPeserta($id)
    {
        $transaction = Yii::$app->db->beginTransaction();
        $model = $this->findModel($id);
        if($model->status_id != 1) {
            Yii::$app->session->setFlash('error', 'Tidak dapat melakukan pengeditan karena pelatihan ini telah diajukan');
            return $this->goBack();
        }

        $modelPeserta = $model->pelatihanPesertas;
        if (count($modelPeserta) < 1) {
            $modelPeserta = [new PelatihanPeserta()];
        }

        if (RoleType::disallow($model)) throw new NotFoundHttpException();

        if ($_POST) {
            // model lampiran
            $oldLampiranIDs = ArrayHelper::map($modelPeserta, 'id', 'id');
            $modelPeserta = Pelatihan::createMultiple(PelatihanPeserta::class, $modelPeserta);
            Pelatihan::loadMultiple($modelPeserta, Yii::$app->request->post());

            //  check data yang dihapus
            $deletedPesertaIDs = array_diff($oldLampiranIDs, array_filter(ArrayHelper::map($modelPeserta, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelPeserta),
                    ActiveForm::validate($model)
                );
            }

            $model->modified_by = \Yii::$app->user->identity->id;

            try {
                $valid = $model->validate();
                if ($valid) {
                    $model->save(); // save model untuk mendapatkan id

                    // check apakah ada data yang dihapus
                    if (!empty($deletedPesertaIDs)) {
                        PelatihanPeserta::deleteAll(['id' => $deletedPesertaIDs]);
                    }

                    // menambahkan id pelatihan kedalam model peserta & soal
                    foreach ($modelPeserta as $i => $o) {
                        $o->pelatihan_id = $model->id;
                        $modelPeserta[$i] = $o;
                    }

                    // validasi dynamic form
                    $valid = PelatihanPeserta::validateMultiple($modelPeserta) && $valid;

                    if (!$valid) {
                        $model->addError('_exception', "Validasi gagal.");
                        $transaction->rollback();
                        return $this->render('update', [
                            'model' => $model,
                            'modelPeserta' => $modelPeserta,
                        ]);
                    }

                    // save dynamic model
                    foreach ($modelPeserta as $i => $o) {
                        $o->tanggal_lahir = date('Y-m-d', strtotime($o->tanggal_lahir));
                        $checkUser = \app\models\User::findOne(['username' => $o->nik]);
                        if($checkUser == []) {
                            $newUser = new User();
                            $newUser->username = $o->nik;
                            $newUser->name = $o->nama;
                            $newUser->password = md5($o->tanggal_lahir);
                            $newUser->role_id = 3;
        
                            $newUser->save();
                            $checkUser = $newUser;
                        }
        
                        $o->user_id = $checkUser->id; //get user id
                        $o->save();
                    }

                }
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            } catch (\Exception $e) {
                $transaction->rollback();
                $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
                $model->addError('_exception', $msg);
            }
        }

        return $this->render('_form-add-peserta', [
            'model' => $model,
            'modelPeserta' => $modelPeserta,
        ]);
    }

    public function actionAddSoal($id)
    {
        $model = $this->findModel($id);
        if($model->status_id != 1) {
            Yii::$app->session->setFlash('error', 'Tidak dapat melakukan pengeditan karena pelatihan ini telah diajukan');
            return $this->goBack();
        }
        $modelSoalJenis = new PelatihanSoalJenis;
        $modelSoal = [new PelatihanSoal];
        $modelSoalPilihan = [[new PelatihanSoalPilihan]];

        if (RoleType::disallow($model)) {
            throw new NotFoundHttpException();
        }

        $transaction = Yii::$app->db->beginTransaction();

        if ($modelSoalJenis->load($_POST)) {
            $checkSoalJenis = PelatihanSoalJenis::findOne(['pelatihan_id' => $model->id, 'jenis_id' => $modelSoalJenis->jenis_id]);
            if($checkSoalJenis){
                Yii::$app->session->setFlash('error', "Soal {$checkSoalJenis->jenis->nama} telah ada, tidak bisa menambahkannya lagi.");
                return $this->goBack();
            }

            // model lampiran
            $oldSoalIDs = ArrayHelper::map($modelSoal, 'id', 'id');
            $modelSoal = Pelatihan::createMultiple(PelatihanSoal::class, $modelSoal);
            Pelatihan::loadMultiple($modelSoal, Yii::$app->request->post());

            //  check data yang dihapus
            $deletedSoalIDs = array_diff($oldSoalIDs, array_filter(ArrayHelper::map($modelSoal, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelSoal),
                    ActiveForm::validate($modelSoalJenis)
                );
            }

            $model->modified_by = \Yii::$app->user->identity->id;
            $modelSoalJenis->pelatihan_id = $model->id;

            try {
                $valid = $model->validate() && $modelSoalJenis->validate();
                if ($valid) {
                    $model->save(); // waktu update
                    $modelSoalJenis->save(); // save model untuk mendapatkan id

                    // check apakah ada data yang dihapus
                    if (!empty($deletedSoalIDs)) {
                        PelatihanSoal::deleteAll(['id' => $deletedSoalIDs]);
                    }

                    foreach ($modelSoal as $i => $o) {
                        $o->order = $i+1;
                        $o->jenis_id = $modelSoalJenis->id;
                        $modelSoal[$i] = $o;
                        if($o->unique_id == null) $o->unique_id = \Yii::$app->security->generateRandomString(50);
                    }


                    // validasi dynamic form
                    $valid = PelatihanSoal::validateMultiple($modelSoal) && $valid;

                    if (!$valid) {
                        $model->addError('_exception', "Validasi gagal.");
                        $transaction->rollback();
                        return $this->render('update', [
                            'model' => $model,
                            'modelSoalJenis' => $modelSoalJenis,
                            'modelSoalPilihan' => $modelSoalPilihan,
                            'modelSoal' => $modelSoal,
                        ]);
                    }
                    
                    
                    // save dynamic model
                    foreach ($modelSoal as $i => $o) {
                        $o->save();
                    }

                    if (isset($_POST['PelatihanSoalPilihan'][0][0])) {
                        foreach ($modelSoal as $indexSoal => $soals) {
                            foreach ($_POST['PelatihanSoalPilihan'][$indexSoal] as $indexPilihan => $pilihan) {
                                $data['PelatihanSoalPilihan'] = $pilihan;
                                $modelPilihan = new PelatihanSoalPilihan();
                                $modelPilihan->load($data);
                                $modelPilihan->pelatihan_soal_id = $soals->id;
                                $valid = $modelPilihan->validate();
                                $modelSoalPilihan[$indexSoal][$indexPilihan] = $modelPilihan;
                            }
                        }
                    }
                    
                    if (!$valid) {
                        $model->addError('_exception', "Validasi gagal.");
                        $transaction->rollback();
                        return $this->render('update', [
                            'model' => $model,
                            'modelSoalJenis' => $modelSoalJenis,
                            'modelSoalPilihan' => $modelSoalPilihan,
                            'modelSoal' => $modelSoal,
                        ]);
                    }
                    
                    // save dynamic model
                    foreach ($modelSoal as $i => $o) {
                        foreach ($modelSoalPilihan[$i] as $indexPilihan => $modelPilihan) {
                            $modelPilihan->pelatihan_soal_id = $o->id;
                            $modelPilihan->save();
                        }
                    }

                    $modelSoalJenis->jumlah_soal = count($modelSoalJenis->pelatihanSoals);
                    $modelSoalJenis->save();
                }
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            } catch (\Exception $e) {
                $transaction->rollback();
                $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
                $model->addError('_exception', $msg);
            }
        }

        return $this->render('_form-add-soal', [
            'model' => $model,
            'modelSoalJenis' => $modelSoalJenis,
            'modelSoalPilihan' => $modelSoalPilihan,
            'modelSoal' => $modelSoal,
        ]);
    }

    public function actionUpdateSoal($id)
    {
        $modelSoalJenis = PelatihanSoalJenis::findOne($id);
        $model = $modelSoalJenis->pelatihan;
        if($model->status_id != 1) {
            Yii::$app->session->setFlash('error', 'Tidak dapat melakukan pengeditan karena pelatihan ini telah diajukan');
            return $this->goBack();
        }
        $modelSoal = $modelSoalJenis->pelatihanSoals;
        $modelSoalPilihan = [];
        
        foreach($modelSoal as $index => $value){
            $item = PelatihanSoal::findOne(['id' => $value->id]);
            if(count($item->pelatihanSoalPilihans) > 1) $modelSoalPilihan[$index] = $item->pelatihanSoalPilihans;
            else $modelSoalPilihan[$index] = [new PelatihanSoalPilihan()];
        }

        if(count($modelSoal) < 1) {
            $modelSoal = [new PelatihanSoal];
            $modelSoalPilihan = [[new PelatihanSoalPilihan]];
        }

        // $modelSoalPilihan = $modelSoalJenis->pelatihanSoals;
        if (RoleType::disallow($model)) {
            throw new NotFoundHttpException();
        }

        $transaction = Yii::$app->db->beginTransaction();

        if ($modelSoalJenis->load($_POST)) {
            // model lampiran
            $oldSoalIDs = ArrayHelper::map($modelSoal, 'id', 'id');
            $modelSoal = Pelatihan::createMultiple(PelatihanSoal::class, $modelSoal);
            Pelatihan::loadMultiple($modelSoal, Yii::$app->request->post());

            //  check data yang dihapus
            $deletedSoalIDs = array_diff($oldSoalIDs, array_filter(ArrayHelper::map($modelSoal, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelSoal),
                    ActiveForm::validate($modelSoalJenis)
                );
            }

            $model->modified_by = \Yii::$app->user->identity->id;
            $modelSoalJenis->pelatihan_id = $model->id;

            try {
                $valid = $model->validate() && $modelSoalJenis->validate();
                if ($valid) {
                    $model->save(); // waktu update
                    $modelSoalJenis->save(); // save model untuk mendapatkan id

                    // check apakah ada data yang dihapus
                    if (!empty($deletedSoalIDs)) {
                        PelatihanSoal::deleteAll(['id' => $deletedSoalIDs]);
                    }

                    foreach ($modelSoal as $i => $o) {
                        $o->order = $i+1;
                        $o->jenis_id = $modelSoalJenis->id;
                        $o->unique_id = \Yii::$app->security->generateRandomString(50);
                        $modelSoal[$i] = $o;
                    }
                    
                    

                    // validasi dynamic form
                    $valid = PelatihanSoal::validateMultiple($modelSoal) && $valid;

                    if (!$valid) {
                        $model->addError('_exception', "Validasi gagal.");
                        $transaction->rollback();
                        return $this->render('update', [
                            'model' => $model,
                            'modelSoalJenis' => $modelSoalJenis,
                            'modelSoalPilihan' => $modelSoalPilihan,
                            'modelSoal' => $modelSoal,
                        ]);
                    }
                    
                    
                    // save dynamic model soal
                    foreach ($modelSoal as $i => $o) {
                        $o->save();
                    }

                    if (isset($_POST['PelatihanSoalPilihan'][0][0])) {
                        foreach ($modelSoal as $indexSoal => $soals) {
                            foreach ($_POST['PelatihanSoalPilihan'][$indexSoal] as $indexPilihan => $pilihan) {
                                $data['PelatihanSoalPilihan'] = $pilihan;
                                $modelPilihan = new PelatihanSoalPilihan();
                                $modelPilihan->load($data);
                                $modelPilihan->pelatihan_soal_id = $soals->id;
                                $valid = $modelPilihan->validate();
                                $modelSoalPilihan[$indexSoal][$indexPilihan] = $modelPilihan;
                            }
                        }
                    }
                    
                    if (!$valid) {
                        $model->addError('_exception', "Validasi gagal.");
                        $transaction->rollback();
                        return $this->render('update', [
                            'model' => $model,
                            'modelSoalJenis' => $modelSoalJenis,
                            'modelSoalPilihan' => $modelSoalPilihan,
                            'modelSoal' => $modelSoal,
                        ]);
                    }
                    
                    // save dynamic model
                    foreach ($modelSoal as $i => $o) {
                        foreach ($modelSoalPilihan[$i] as $indexPilihan => $modelPilihan) {
                            $modelPilihan->pelatihan_soal_id = $o->id;
                            $modelPilihan->save();
                        }
                    }

                    $modelSoalJenis->jumlah_soal = count($modelSoal);
                    $modelSoalJenis->save();
                }
                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            } catch (\Exception $e) {
                $transaction->rollback();
                $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
                $model->addError('_exception', $msg);
            }
        }

        return $this->render('_form-add-soal', [
            'model' => $model,
            'modelSoalJenis' => $modelSoalJenis,
            'modelSoalPilihan' => $modelSoalPilihan,
            'modelSoal' => $modelSoal,
        ]);
    }

    public function actionAjukan($id)
    {
        $model = Pelatihan::find()->where(['id' => $id, 'status_id' => Constant::STATUS_PELENGKAPAN_DATA])->one();
        if (RoleType::disallow($model)) throw new NotFoundHttpException();
        if($model) {
            try{
                $model->status_id = 2;
                $model->save();
                Yii::$app->session->setFlash('success', 'Pelatihan berhasil diajukan');
            }catch(\Throwable $e){
                Yii::$app->session->setFlash('error', 'Pelatihan gagal diajukan');
            }
            return $this->goBack();
        }
        
        Yii::$app->session->setFlash('error', 'Pelatihan tidak ditemukan / Pelatihan sudah diajukan');
        return $this->goBack();
    }
    
    public function actionSetujui($id)
    {
        $model = Pelatihan::find()->where(['id' => $id, 'status_id' => Constant::STATUS_MENUNGGU_PERSETUJUAN])->one();
        if (RoleType::disallow($model)) throw new NotFoundHttpException();
        if($model) {
            try{
                $model->status_id = 3;
                $model->validate();
                if($model->save()){
                    Yii::$app->session->setFlash('success', 'Pelatihan berhasil disetujui');
                }else{
                    Yii::$app->session->setFlash('success', 'Pelatihan gagal disetujui');
                }
            }catch(\Throwable $e){
                Yii::$app->session->setFlash('error', 'Pelatihan gagal disetujui');
            }
            return $this->goBack();
        }
        
        Yii::$app->session->setFlash('error', 'Pelatihan tidak ditemukan / Pelatihan sudah disutujui');
        return $this->goBack();
    }

    public function uploadFile($file, $suffix, $dir, $url){
        $tmp = explode('.', $file->name);
        $filename = "{$suffix}_";
        $extension = end($tmp);
        $filename .= \Yii::$app->security->generateRandomString() . ".{$extension}";
        $path = $dir . $filename;
        if($file->saveAs($path)) return $url.$filename;
    }
    
    public function actionAjukanMonev($id)
    {
        $model = Pelatihan::find()->where(['id' => $id, 'status_id' => [Constant::STATUS_DISETUJUI, Constant::STATUS_PENGAJUAN_MONEV]])->one();
        if($model == false){
            Yii::$app->session->setFlash('error', 'Pelatihan tidak ditemukan');
            return $this->redirect(['/pelatihan/view', 'id' => $id]);
        }
        $oldStatus = $model->status_id;
        $oldSertifikat = $model->sertifikat;
        $oldRekapitulasiNilai = $model->rekapitulasi_nilai;
        $oldAbsensiKehadiran = $model->absensi_kehadiran;

        if (RoleType::disallow($model)) throw new NotFoundHttpException();
        if($model->load($_POST)){
            try{
                $transaction = Yii::$app->db->beginTransaction();
                $sertifikat = UploadedFile::getInstance($model, "sertifikat");
                $rekapitulasi_nilai = UploadedFile::getInstance($model, "rekapitulasi_nilai");
                $absensi_kehadiran = UploadedFile::getInstance($model, "absensi_kehadiran");
                if($model->status_id == 3) $valid = ($sertifikat != null && $model->hasil_pelaksanaan_pelatihan != null && $model->dasar_pelaksanaan != null && $rekapitulasi_nilai != null && $absensi_kehadiran != null);
                else $valid = ($model->hasil_pelaksanaan_pelatihan != null && $model->dasar_pelaksanaan != null);
                if($valid){
                    if($sertifikat) $model->sertifikat = $this->uploadFile($sertifikat, "sertifikat", $model->getUploadedFolder(), $model->getUploadedUrlFolder());
                    else $model->sertifikat = $oldSertifikat;
                    if($rekapitulasi_nilai) $model->rekapitulasi_nilai = $this->uploadFile($rekapitulasi_nilai, "rekapitulasi_nilai", $model->getUploadedFolder(), $model->getUploadedUrlFolder());
                    else $model->rekapitulasi_nilai = $oldRekapitulasiNilai;
                    if($absensi_kehadiran) $model->absensi_kehadiran = $this->uploadFile($absensi_kehadiran, "absensi_kehadiran", $model->getUploadedFolder(), $model->getUploadedUrlFolder());
                    else $model->absensi_kehadiran = $oldAbsensiKehadiran;

                    if($model->status_id == 3) $model->status_id = 4;
                    $model->save();
                    $transaction->commit();
                    if($oldStatus == 3) Yii::$app->session->setFlash('success', 'Monev Pelatihan Berhasil Di Ajukan');
                    else Yii::$app->session->setFlash('success', 'Monev Pelatihan Berhasil Di Ubah');
                    return $this->redirect(['/pelatihan/view', 'id' => $model->id]);
                }else{
                    Yii::$app->session->setFlash('error', 'Data gagal di validasi.');
                }
            }catch(\Throwable $e){
                Yii::$app->session->setFlash('error', 'Pelatihan gagal disetujui');
            }
        }
        return $this->render('form-upload-monev',[
            'model' => $model
        ]);
    }

    public function actionSetujuiMonev($id){
        $model = Pelatihan::find()->where(['id' => $id, 'status_id' => Constant::STATUS_PENGAJUAN_MONEV])->one();
        if($model == false){
            throw new NotFoundHttpException();
        }
        if (RoleType::disallow($model)) throw new NotFoundHttpException();

        if($_POST){
            try{
                $model->status_id = 5; // status selesai
                $model->save();
                Yii::$app->session->setFlash('success', 'Monev Pelatihan berhasil disetujui');
            }catch(\Throwable $th){
                Yii::$app->session->setFlash('error', 'Monev Pelatihan gagal disetujui');
            }
        }
        return $this->redirect(['pelatihan/view', 'id' => $model->id]);
    }

    public function findModelJenis($parent_id, $id)
    {
        $model = PelatihanSoalJenis::findOne(['pelatihan_id' => $parent_id, 'id' => $id]);
        if ($model) {
            return $model;
        }

        throw new NotFoundHttpException();
    }

    public function actionUpdateKehadiran($id){
        $model = $this->findModel($id);
        if(RoleType::disallow($model)) throw new \yii\web\NotFoundHttpException();
        if($model->status_id != 3) throw new \yii\web\ForbiddenHttpException();
        if($_POST){
            $transaction = Yii::$app->db->beginTransaction();
            $selection = (array)Yii::$app->request->post('selection');
            $hadir = PelatihanPeserta::find()->where(['pelatihan_id' => $model->id, 'id' => $selection])->all();
            $tidak_hadir = PelatihanPeserta::find()->where(['and', ['pelatihan_id' => $model->id], ['not in', 'id', $selection]])->all();
            

            foreach($hadir as $participant){
                $participant->kehadiran = 1;
                $participant->save();
            }

            foreach($tidak_hadir as $participant){
                $participant->kehadiran = 0;
                $participant->save();
            }

            $transaction->commit();
            Yii::$app->session->setFlash('success', 'Data kehadiran peserta berhasil diubah');
            return $this->redirect(['/pelatihan/view', 'id' => $model->id]);
        }

        $dataProvider =  new \yii\data\ActiveDataProvider([
            'query' => $model->getPelatihanPesertas(),
            'pagination' => [
                'pageSize' => 999999,
                'pageParam' => 'page-pelatihanpesertas',
            ],
        ]);

        return $this->render('list-kehadiran',[
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    public function actionUpdateNilaiPraktek($id){
        $model = $this->findModel(['id' => $id]);
        if(RoleType::disallow($model)) throw new \yii\web\NotFoundHttpException();
        if($model->status_id != 3) throw new \yii\web\ForbiddenHttpException();
        $peserta = PelatihanPeserta::find()->where(['pelatihan_id' => $id, 'kehadiran' => Constant::KEHADIRAN_HADIR]);
        if($peserta->count() == 0){
            Yii::$app->session->setFlash('error',"Setidaknnya harus ada peserta yang hadir dalam pelatihan.");
            return $this->redirect(['view','id' => $id]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $peserta,
            'pagination' => [
                'pageSize' => 999999,
                'pageParam' => 'page-pelatihanpesertas',
            ],
        ]);
        
        $transaction = Yii::$app->db->beginTransaction();
        if($_POST){
            foreach($_POST['PelatihanPeserta'] as $index => $value){
                $modelPeserta = PelatihanPeserta::findOne(['id' => $index]);
                $modelPeserta->nilai_praktek = $value['nilai_praktek'];
                $modelPeserta->komentar = $value['komentar'];
                $valid = $modelPeserta->validate();
                if($valid == false) {
                    $transaction->rollBack();
                    return $this->render('update_nilai_praktek.php', [
                        "model" => $model,
                        "dataProvider" => $dataProvider,
                    ]);
                }
                $modelPeserta->save();
            }
            $transaction->commit();
            return $this->redirect(['/pelatihan/view', 'id' => $model->id]);
        }

        return $this->render('update_nilai_praktek.php', [
            "model" => $model,
            "dataProvider" => $dataProvider,
        ]);
    }
}
