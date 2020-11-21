<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PelatihanSoalJenis;

/**
* PelatihanSoalJenisSearch represents the model behind the search form about `app\models\PelatihanSoalJenis`.
*/
class PelatihanSoalJenisSearch extends PelatihanSoalJenis
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'jenis_id', 'pelatihan_id', 'waktu_pengerjaan', 'jumlah_soal'], 'integer'],
];
}

/**
* @inheritdoc
*/
public function scenarios()
{
// bypass scenarios() implementation in the parent class
return Model::scenarios();
}

/**
* Creates data provider instance with search query applied
*
* @param array $params
*
* @return ActiveDataProvider
*/
public function search($params)
{
$query = PelatihanSoalJenis::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
            'jenis_id' => $this->jenis_id,
            'pelatihan_id' => $this->pelatihan_id,
            'waktu_pengerjaan' => $this->waktu_pengerjaan,
            'jumlah_soal' => $this->jumlah_soal,
        ]);

return $dataProvider;
}
}