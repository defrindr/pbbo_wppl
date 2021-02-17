<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PelatihanJenis;

/**
* PelatihanJenisSearch represents the model behind the search form about `\app\models\PelatihanJenis`.
*/
class PelatihanJenisSearch extends PelatihanJenis
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id'], 'integer'],
            [['index', 'nama', 'sasaran', 'peserta', 'durasi', 'instansi_id'], 'safe'],
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
$query = PelatihanJenis::find();

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
        ]);

        $query->andFilterWhere(['like', 'index', $this->index])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'sasaran', $this->sasaran])
            ->andFilterWhere(['like', 'peserta', $this->peserta])
            ->andFilterWhere(['like', 'durasi', $this->durasi])
            ->andFilterWhere(['like', 'instansi_id', $this->instansi_id]);

return $dataProvider;
}
}