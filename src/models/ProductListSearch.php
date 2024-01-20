<?php

namespace ZakharovAndrew\sklad\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use ZakharovAndrew\sklad\models\ProductList;

/**
 * ProductListSearch represents the model behind the search form of `ZakharovAndrew\sklad\models\ProductList`.
 */
class ProductListSearch extends ProductList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'product_id', 'product_count', 'bad', 'good'], 'integer'],
            [['link', 'datetime_at', 'datetime_pay', 'name', 'product_category_id'], 'safe'],
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
        $query = ProductList::find();

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
            'product_id' => $this->product_id,
            'product_count' => $this->product_count,
            'datetime_at' => $this->datetime_at,
            'datetime_pay' => $this->datetime_pay,
        ]);

        $query->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
    
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchSklad($params)
    {
        $query = ProductList::find()
                ->select(['product.id as product_id', 'SUM(product_list.product_count) as product_count', 'product.images as images', 'product.name as name', 'product.comments',  'product.good', 'product.bad'])
                ->join( 'RIGHT JOIN', 'product', 'product.id = product_list.product_id')
                //->where('product_list.status = 1')
                ->groupBy('product.id');

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
            'product_id' => $this->product_id,
            'product_count' => $this->product_count,
            'product.product_category_id' => $this->product_category_id,
            'datetime_at' => $this->datetime_at,
            'datetime_pay' => $this->datetime_pay,
        ]);

        $query->andFilterWhere(['like', 'link', $this->link]);
        $query->andFilterWhere(['like', 'product.name', $this->name]);

        return $dataProvider;
    }
}
