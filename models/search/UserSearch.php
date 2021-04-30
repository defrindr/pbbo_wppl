<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role_id'], 'integer'],
            [['username', 'password', 'name', 'photo_url', 'last_login', 'last_logout'], 'safe'],
            //parameter tambahan
            [['stringPelatihanDiikuti'], 'safe']
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
        $userLogin = \Yii::$app->user->identity;
        $query = User::find();

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
            'role_id' => $this->role_id,
            'last_login' => $this->last_login,
            'last_logout' => $this->last_logout,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'photo_url', $this->photo_url]);

        if ($userLogin->role_id == 2) { // dinas / kecamatan bisa  lihat semua peserta
            $query->andFilterWhere([
                'or',
                ['user.id' => $userLogin->id],
                ['user.role_id' => 3]
            ]);
        }

        /*
        select user.name, group_concat(pelatihan.nama)
        from user
        left join pelatihan_peserta on pelatihan_peserta.user_id = user.id 
        left join pelatihan on pelatihan_peserta.pelatihan_id = pelatihan.id 
        group by user.name
        */

        $query->leftJoin('pelatihan_peserta', 'pelatihan_peserta.user_id = user.id');
        $query->leftJoin('pelatihan', 'pelatihan_peserta.pelatihan_id = pelatihan.id');
        $query->leftJoin('pelatihan_jenis', 'pelatihan_jenis.id = pelatihan.jenis');
        $query->select("
            user.*,group_concat(concat(pelatihan.nama) SEPARATOR '<br/>') as stringPelatihanDiikuti
        ");
        $query->groupBy("user.name");

        if (isset($this->stringPelatihanDiikuti)) {
            $query->andWhere([
                "OR",
                ['like', "pelatihan.nama", $this->stringPelatihanDiikuti],
                ['like', "pelatihan.materi_pelatihan", $this->stringPelatihanDiikuti],
                ['like', "pelatihan_jenis.nama", $this->stringPelatihanDiikuti]
            ]);
        }

        return $dataProvider;
    }
}
