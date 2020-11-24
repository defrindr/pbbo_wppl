<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace app\controllers\base;

use app\models\Action;
use app\models\Pelatihan;
use app\models\PelatihanLampiran;
use app\models\Peserta;
use app\models\PelatihanPeserta;
use app\models\PelatihanSoalJenis;
use app\models\search\PelatihanSearch;
use dmstr\bootstrap\Tabs;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;

/**
 * PelatihanController implements the CRUD actions for Pelatihan model.
 */
class PelatihanController extends Controller
{

    /**
     * @var boolean whether to enable CSRF validation for the actions in this controller.
     * CSRF validation is enabled only when both this property and [[Request::enableCsrfValidation]] are true.
     */
    public $enableCsrfValidation = false;
    public function behaviors()
    {
        //NodeLogger::sendLog(Action::getAccess($this->id));
        //apply role_action table for privilege (doesn't apply to super admin)
        return Action::getAccess($this->id);
    }

    /**
     * Lists all Pelatihan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PelatihanSearch;
        $dataProvider = $searchModel->search($_GET);

        Tabs::clearLocalStorage();

        Url::remember();
        \Yii::$app->session['__crudReturnUrl'] = null;

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single Pelatihan model.
     * @param integer $id
     *
     * @return mixed
     */
    public function actionView($id)
    {
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Pelatihan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pelatihan;
        $modelLampiran = [new PelatihanLampiran];

        $transaction = \Yii::$app->db->beginTransaction();

        try {
            if ($model->load($_POST)) {
                if(!strpos($model->forum_diskusi, "http")) {
                    $model->forum_diskusi = "http://{$model->forum_diskusi}";
                }

                $modelLampiran = Pelatihan::createMultiple(PelatihanLampiran::class);
                Pelatihan::loadMultiple($modelLampiran, \Yii::$app->request->post());

                if (\Yii::$app->request->isAjax) { //ajax validation
                    \Yii::$app->response->format = Response::FORMAT_JSON;
                    return ArrayHelper::merge(
                        ActiveForm::validateMultiple($modelLampiran),
                        ActiveForm::validate($model)
                    );
                }

                $model->modified_by = \Yii::$app->user->identity->id;
                // validate all models
                $valid = $model->validate();
                
                if ($valid) {
                    $model->save(); // save model untuk mendapatkan id

                    foreach ($modelLampiran as $i => $o) {
                        $o->scenario = "create";
                        $o->pelatihan_id = $model->id;

                        $o->image = UploadedFile::getInstanceByName("PelatihanLampiran[$i][image]");
                        $tmp = explode('.', $o->image->name);
                        $extension = end($tmp);

                        $o->file = \Yii::$app->security->generateRandomString() . ".{$extension}";
                        $path = $o->getUploadedFolder() . $o->file;
                        $o->image->saveAs($path);

                        $modelLampiran[$i] = $o;
                    }

                    $valid = PelatihanLampiran::validateMultiple($modelLampiran) && $valid;
                    if (!$valid) {
                        $transaction->rollback();
                        return $this->render('create', [
                            'model' => $model,
                            'modelLampiran' => $modelLampiran,
                        ]);
                    }

                    foreach ($modelLampiran as $i => $o) {
                        $o->save();
                    }
                }else{
                    $model->addError('_exception', "Validasi gagal");
                }

                $transaction->commit();
                return $this->redirect(['view', 'id' => $model->id]);
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('create', [
            'model' => $model,
            'modelLampiran' => (empty($modelLampiran)) ? [new PelatihanLampiran] : $modelLampiran,
        ]);
    }

    /**
     * Updates an existing Pelatihan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        if($model->status_id != 1) {
            Yii::$app->session->setFlash('error', 'Tidak dapat melakukan pengeditan karena pelatihan ini telah diajukan');
            return $this->goBack();
        }
        // ambil data relasional
        $modelLampiran = $model->pelatihanLampirans;


        // simpan url file lama kedalam variable baru
        $oldLampiranFile = [];
        foreach ($modelLampiran as $o) {
            $oldLampiranFile[$o->id] = $o->file;
        }

        // buat array instance jika data relasi kosong
        if (count($modelLampiran) == 0) {
            $modelLampiran = [new PelatihanLampiran];
        }
        
        $transaction = \Yii::$app->db->beginTransaction();

        if ($model->load($_POST)) {

            if(!strpos($model->forum_diskusi, "http")) {
                $model->forum_diskusi = "http://{$model->forum_diskusi}";
            }

            // model lampiran
            $oldLampiranIDs = ArrayHelper::map($modelLampiran, 'id', 'id');
            $modelLampiran = Pelatihan::createMultiple(PelatihanLampiran::class, $modelLampiran);
            Pelatihan::loadMultiple($modelLampiran, Yii::$app->request->post());

            //  check data yang dihapus
            $deletedLampiranIDs = array_diff($oldLampiranIDs, array_filter(ArrayHelper::map($modelLampiran, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelLampiran),
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
                        PelatihanLampiran::deleteAll(['id' => $deletedLampiranIDs]);
                    }

                    // menambahkan id pelatihan kedalam model peserta & soal
                    foreach ($modelLampiran as $i => $o) {
                        $o->scenario = "update"; // set scenario to update
                        $oldLampiranFile = $o->file;
                        $o->pelatihan_id = $model->id;
                        $file = UploadedFile::getInstanceByName("PelatihanLampiran[$i][image]");
                        //  check apakah ada file yang diubah
                        if ($file != null) {
                            $tmp = explode('.', $file->name);
                            $extension = end($tmp);
                            $o->file = \Yii::$app->security->generateRandomString() . ".{$extension}";
                            $path = $o->getUploadedFolder() . $o->file;
                            $file->saveAs($path);
                        } else {
                            $o->file = $oldLampiranFile;
                        }

                    }

                    // validasi dynamic form
                    $valid = PelatihanLampiran::validateMultiple($modelLampiran) && $valid;

                    if (!$valid) {
                        $model->addError('_exception', "Validasi gagal.");
                        $transaction->rollback();
                        return $this->render('update', [
                            'model' => $model,
                            'modelLampiran' => $modelLampiran,
                        ]);
                    }

                    // save dynamic model
                    foreach ($modelLampiran as $i => $o) {
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

        return $this->render('update', [
            'model' => $model,
            'modelLampiran' => $modelLampiran,
        ]);
    }

    /**
     * Deletes an existing Pelatihan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        try {
            $model = $this->findModel($id);
            $model->flag = 0;
            $model->save();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            \Yii::$app->getSession()->addFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$id', ',');
        if ($isPivot == true) {
            return $this->redirect(Url::previous());
        } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
            Url::remember(null);
            $url = \Yii::$app->session['__crudReturnUrl'];
            \Yii::$app->session['__crudReturnUrl'] = null;

            return $this->redirect($url);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Pelatihan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pelatihan the loaded model
     * @throws HttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        $model = Pelatihan::findOne($id);
        if (($model) !== null) {
            if ($model->flag) {
                return $model;
            }
        }
        throw new HttpException(404, 'The requested page does not exist.');
    }

    /**
     * Displays a single PelatihanSoalJenis model.
     * @param integer $id
     *
     * @return mixed
     */
    public function actionViewJenisSoal($id)
    {
        \Yii::$app->session['__crudReturnUrl'] = Url::previous();
        Url::remember();
        Tabs::rememberActiveState();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PelatihanSoalJenis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateJenisSoal()
    {
        $model = new PelatihanSoalJenis;

        try {
            if ($model->load($_POST) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('create', ['model' => $model]);
    }

    /**
     * Updates an existing PelatihanSoalJenis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateJenisSoal($id)
    {
        $model = $this->findModel($id);

        if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PelatihanSoalJenis model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteJenisSoal($id)
    {
        try {
            $this->findModel($id)->delete();
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2])) ? $e->errorInfo[2] : $e->getMessage();
            \Yii::$app->getSession()->addFlash('error', $msg);
            return $this->redirect(Url::previous());
        }

        // TODO: improve detection
        $isPivot = strstr('$id', ',');
        if ($isPivot == true) {
            return $this->redirect(Url::previous());
        } elseif (isset(\Yii::$app->session['__crudReturnUrl']) && \Yii::$app->session['__crudReturnUrl'] != '/') {
            Url::remember(null);
            $url = \Yii::$app->session['__crudReturnUrl'];
            \Yii::$app->session['__crudReturnUrl'] = null;

            return $this->redirect($url);
        } else {
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the PelatihanSoalJenis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PelatihanSoalJenis the loaded model
     * @throws HttpException if the model cannot be found
     */
    protected function findModelJenisSoal($id)
    {
        if (($model = PelatihanSoalJenis::findOne($id)) !== null) {
            return $model;
        } else {
            throw new HttpException(404, 'The requested page does not exist.');
        }
    }
}
