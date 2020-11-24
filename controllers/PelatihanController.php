<?php

namespace app\controllers;

use app\components\RoleType;
use app\models\base\PelatihanSoalPilihan as BasePelatihanSoalPilihan;
use app\models\Pelatihan;
use app\models\PelatihanPeserta;
use app\models\PelatihanSoal;
use app\models\PelatihanSoalJenis;
use app\models\PelatihanSoalPilihan;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * This is the class for controller "PelatihanController".
 */
class PelatihanController extends \app\controllers\base\PelatihanController
{
    public function actionAddPeserta($id)
    {
        $model = $this->findModel($id);
        if($model->status_id != 1) {
            Yii::$app->session->setFlash('error', 'Tidak dapat melakukan pengeditan karena pelatihan ini telah diajukan');
            return $this->goBack();
        }
        $modelPeserta = $model->pelatihanPesertas;
        $transaction = Yii::$app->db->beginTransaction();
        if (count($modelPeserta) < 1) {
            $modelPeserta = [new PelatihanPeserta()];
        }

        if (RoleType::disallow($model)) {
            throw new NotFoundHttpException();
        }

        if ($_POST) {
            // model lampiran
            $oldLampiranIDs = ArrayHelper::map($modelPeserta, 'id', 'id');
            $modelPeserta = Pelatihan::createMultiple(PelatihanPeserta::class, $modelPeserta);
            Pelatihan::loadMultiple($modelPeserta, Yii::$app->request->post());

            //  check data yang dihapus
            $deletedLampiranIDs = array_diff($oldLampiranIDs, array_filter(ArrayHelper::map($modelPeserta, 'id', 'id')));

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
                    if (!empty($deletedLampiranIDs)) {
                        PelatihanPeserta::deleteAll(['id' => $deletedLampiranIDs]);
                    }

                    // menambahkan id pelatihan kedalam model peserta & soal
                    foreach ($modelPeserta as $i => $o) {
                        $o->pelatihan_id = $model->id;
                        $o->password = $o->tanggal_lahir;
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
                        $o->jenis_id = $modelSoalJenis->id;
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
        if($model->status_id != 1) {
            Yii::$app->session->setFlash('error', 'Tidak dapat melakukan pengeditan karena pelatihan ini telah diajukan');
            return $this->goBack();
        }
        $model = $modelSoalJenis->pelatihan;
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
                        $o->jenis_id = $modelSoalJenis->id;
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


    public function actionApprove($id)
    {

    }

    
    public function actionAjukan($id)
    {
        $model = Pelatihan::find()->where(['id' => $id, 'status_id' => 1])->one();
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


    public function findModelJenis($parent_id, $id)
    {
        $model = PelatihanSoalJenis::findOne(['pelatihan_id' => $parent_id, 'id' => $id]);
        if ($model) {
            return $model;
        }

        throw new NotFoundHttpException();
    }
}
