<?php

namespace porcelanosa\yii2siteoptions\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use porcelanosa\yii2siteoptions\models\Siteoptions;

/**
 * SiteoptionsSearch represents the model behind the search form of `porcelanosa\yii2siteoptions\models\Siteoptions`.
 */
class SiteoptionsSearch extends Siteoptions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'option_type_id', 'active', 'sort'], 'integer'],
            [['option_name', 'option_alias'], 'safe'],
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
        $query = Siteoptions::find();

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
            'option_type_id' => $this->option_type_id,
            'active' => $this->active,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'option_name', $this->option_name])
            ->andFilterWhere(['like', 'option_alias', $this->option_alias]);

        return $dataProvider;
    }
}
