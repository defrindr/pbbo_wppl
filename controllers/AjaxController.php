<?php
namespace app\controllers;

use app\models\WilayahDesa;
use app\models\WilayahKecamatan;
use app\models\WilayahKabupaten;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;

class AjaxController extends Controller
{
    public function actionGetKabupaten()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            $selected_id = $_REQUEST['selected_id'];
            if ($parents != null) {
                $provinsi_id = $parents[0];
                $out = WilayahKabupaten::find()->where(['provinsi_id' => $provinsi_id])->select(['id', 'nama as name'])->asArray()->all();
                return ['output' => $out, 'selected' => $selected_id];
            }
        }

        return ['output' => '', 'selected' => ''];
    }

    public function actionGetKecamatan()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            $selected_id = $_REQUEST['selected_id'];
            if ($parents != null) {
                $kabupaten_id = $parents[0];
                $out = WilayahKecamatan::find()->where(['kabupaten_id' => $kabupaten_id])->select(['id', 'nama as name'])->asArray()->all();
                return ['output' => $out, 'selected' => $selected_id];
            }
        }

        return ['output' => '', 'selected' => ''];
    }

    public function actionGetDesa()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            $selected_id = $_REQUEST['selected_id'];
            if ($parents != null) {
                $kecamatan_id = $parents[0];
                $out = WilayahDesa::find()->where(['kecamatan_id' => $kecamatan_id])->select(['id', 'nama as name'])->asArray()->all();
                return ['output' => $out, 'selected' => $selected_id];
            }
        }

        return ['output' => '', 'selected' => ''];
    }
}
