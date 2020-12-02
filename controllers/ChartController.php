<?php

namespace app\controllers;

use app\models\Pelatihan;
use app\models\search\PelatihanSearch;
use Yii;
use yii\web\Controller;

class ChartController extends Controller
{
    public function actionPelatihanTingkat()
    {
        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');

        $models = Pelatihan::find()
            ->leftJoin("pelatihan_tingkat", 'pelatihan_tingkat.id = pelatihan.tingkat_id')
            ->select('pelatihan_tingkat.nama label, COUNT(pelatihan.id) AS value')
            ->where(['pelatihan.flag' => 1])
            ->andWhere(['like', 'tanggal_mulai', $tahun])
            ->groupBy(['pelatihan_tingkat.nama'])
            ->asArray()
            ->all();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        return [
            "result" => true,
            "data" => [
                "label" => array_column($models, 'label'),
                "value" => array_column($models, 'value')
            ]
        ];
    }

    public function actionPelatihanUserPembuat()
    {
        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');

        $models = Pelatihan::find()
            ->leftJoin("user", 'user.id = pelatihan.created_by')
            ->select('user.name label, COUNT(pelatihan.id) AS value')
            ->where(['pelatihan.flag' => 1])
            ->andWhere(['like', 'tanggal_mulai', $tahun])
            ->groupBy(['user.name'])
            ->asArray()
            ->all();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            "result" => true,
            "data" => [
                "label" => array_column($models, 'label'),
                "value" => array_column($models, 'value')
            ]
        ];
    }

    public function actionPelatihanBulan()
    {

        $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');

        $query = "
        SELECT master_bulan.nama label, count(pelatihan.id) as value
        FROM master_bulan 
        LEFT JOIN pelatihan 
            ON MONTH(pelatihan.tanggal_mulai) = master_bulan.id 
            AND YEAR(pelatihan.tanggal_mulai) = :tahun
        GROUP BY master_bulan.nama
        ORDER BY master_bulan.id
        ";
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand($query, [':tahun' => $tahun]);
        $models = $command->queryAll();

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return [
            "result" => true,
            "data" => [
                "label" => array_column($models, 'label'),
                "value" => array_column($models, 'value')
            ]
        ];
    }
}
