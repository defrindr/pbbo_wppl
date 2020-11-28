<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pelatihan;
use app\components\RoleType;

/**
* PelatihanSearch represents the model behind the search form about `app\models\Pelatihan`.
*/
class PelatihanSearch extends Pelatihan
{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['id', 'tingkat_id', 'status', 'pelaksana_id', 'created_by', 'modified_by'], 'integer'],
            [['nama', 'latar_belakang', 'tujuan', 'tanggal_mulai', 'tanggal_selesai', 'forum_diskusi', 'created_at', 'modified_at'], 'safe'],
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
        $query = Pelatihan::find()->where(['flag' => 1]);
        $user = Yii::$app->user->identity;
        if(RoleType::SA != $user->role_id){
            $query->AndWhere(['pelaksana_id' => $user->id]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query->orderBy(['created_at' => SORT_DESC]),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'tingkat_id' => $this->tingkat_id,
            'status' => $this->status,
            'pelaksana_id' => $this->pelaksana_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'modified_at' => $this->modified_at,
            'modified_by' => $this->modified_by,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'latar_belakang', $this->latar_belakang])
            ->andFilterWhere(['like', 'tujuan', $this->tujuan])
            ->andFilterWhere(['like', 'forum_diskusi', $this->forum_diskusi]);

        return $dataProvider;
    }
}
