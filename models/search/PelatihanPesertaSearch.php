<?php

namespace app\models\search;

use app\models\PelatihanPeserta;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PelatihanPesertaSearch represents the model behind the search form about `app\models\PelatihanPeserta`.
 */
class PelatihanPesertaSearch extends PelatihanPeserta
{
/**
 * @inheritdoc
 */
    public function rules()
    {
        return [
            [['id', 'pelatihan_id', 'jenis_kelamin_id', 'pendidikan_id', 'pekerjaan_id', 'rt', 'rw', 'peserta_konfirmasi', 'nilai_pretest', 'nilai_posttest', 'nilai_praktek', 'kesibukan_pasca_pelatihan', 'masa_berlaku', 'lanjut'], 'integer'],
            [['nik', 'nama', 'email', 'no_telp', 'tanggal_lahir', 'tempat_lahir', 'alamat', 'password', 'komentar', 'nama_usaha', 'jenis_usaha', 'lokasi', 'jenis_izin_usaha', 'nib'], 'safe'],
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
        $query = PelatihanPeserta::find();

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
            'pelatihan_id' => $this->pelatihan_id,
            'jenis_kelamin_id' => $this->jenis_kelamin_id,
            'pendidikan_id' => $this->pendidikan_id,
            'pekerjaan_id' => $this->pekerjaan_id,
            'rt' => $this->rt,
            'rw' => $this->rw,
            'peserta_konfirmasi' => $this->peserta_konfirmasi,
            'nilai_pretest' => $this->nilai_pretest,
            'nilai_posttest' => $this->nilai_posttest,
            'nilai_praktek' => $this->nilai_praktek,
            'kesibukan_pasca_pelatihan' => $this->kesibukan_pasca_pelatihan,
            'masa_berlaku' => $this->masa_berlaku,
            'lanjut' => $this->lanjut,
        ]);

        $query->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'no_telp', $this->no_telp])
            ->andFilterWhere(['like', 'tanggal_lahir', $this->tanggal_lahir])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'komentar', $this->komentar])
            ->andFilterWhere(['like', 'nama_usaha', $this->nama_usaha])
            ->andFilterWhere(['like', 'jenis_usaha', $this->jenis_usaha])
            ->andFilterWhere(['like', 'lokasi', $this->lokasi])
            ->andFilterWhere(['like', 'jenis_izin_usaha', $this->jenis_izin_usaha])
            ->andFilterWhere(['like', 'nib', $this->nib]);

        return $dataProvider;
    }
}
