<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PelatihanSoal;

/**
* PelatihanSoalSearch represents the model behind the search form about `app\models\PelatihanSoal`.
*/
class PelatihanSoalSearch extends PelatihanSoal
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'jenis_id', 'kategori_soal_id', 'nomor'], 'integer'],
            [['soal', 'pilihan', 'jawaban'], 'safe'],
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
$query = PelatihanSoal::find();

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
            'kategori_soal_id' => $this->kategori_soal_id,
            'nomor' => $this->nomor,
        ]);

        $query->andFilterWhere(['like', 'soal', $this->soal])
            ->andFilterWhere(['like', 'pilihan', $this->pilihan])
            ->andFilterWhere(['like', 'jawaban', $this->jawaban]);

return $dataProvider;
}
}