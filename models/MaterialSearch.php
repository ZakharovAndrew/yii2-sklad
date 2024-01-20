<?php

namespace ZakharovAndrew\sklad\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZakharovAndrew\sklad\models\Material;

/**
 * MaterialSearch represents the model behind the search form of `ZakharovAndrew\sklad\models\Material`.
 */
class MaterialSearch extends Material
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'material_category_id', 'cost', 'units_of_measure'], 'integer'],
            [['name', 'images', 'comments'], 'safe'],
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
        $query = Material::find();

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
            'material_category_id' => $this->material_category_id,
            'cost' => $this->cost,
            'units_of_measure' => $this->units_of_measure,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
