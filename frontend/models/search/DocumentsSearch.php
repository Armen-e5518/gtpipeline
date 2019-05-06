<?php

namespace frontend\models\search;

use frontend\models\Documents;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DocumentsSearch represents the model behind the search form about `frontend\models\Documents`.
 */
class DocumentsSearch extends Documents
{
   /**
    * @inheritdoc
    */
   public function rules()
   {
      return [
         [['id', 'user_id'], 'integer'],
         [['url', 'category', 'type', 'date', 'title'], 'safe'],
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
      $query = Documents::find();

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
         'user_id' => $this->user_id,
      ]);

      $query->andFilterWhere(['like', 'url', $this->url])
         ->andFilterWhere(['like', 'type', $this->type])
         ->andFilterWhere(['like', 'category', $this->category])
         ->andFilterWhere(['like', 'date', $this->date])
         ->andFilterWhere(['like', 'type', $this->type]);

      return $dataProvider;
   }
}
