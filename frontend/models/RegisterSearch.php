<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Register;

/**
 * RegisterSearch represents the model behind the search form of `frontend\models\Register`.
 */
class RegisterSearch extends Register
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['regis_id', 'fullname', 'birthday', 'sex', 'age', 'nationality_id', 'team', 'address', 'mobile', 'email', 'racetype_id', 'racecat_id', 'shirt_id', 'confirm', 'status', 'registration_ip', 'create_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Register::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'birthday' => $this->birthday,
            'create_date' => $this->create_date,
        ]);

        $query->andFilterWhere(['like', 'regis_id', $this->regis_id])
            ->andFilterWhere(['like', 'fullname', $this->fullname])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'age', $this->age])
            ->andFilterWhere(['like', 'nationality_id', $this->nationality_id])
            ->andFilterWhere(['like', 'team', $this->team])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'racetype_id', $this->racetype_id])
            ->andFilterWhere(['like', 'racecat_id', $this->racecat_id])
            ->andFilterWhere(['like', 'shirt_id', $this->shirt_id])
            ->andFilterWhere(['like', 'confirm', $this->confirm])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'registration_ip', $this->registration_ip]);

        return $dataProvider;
    }
}
