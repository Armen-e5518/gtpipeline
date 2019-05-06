<?php

namespace frontend\models\search;


use frontend\models\User;
use frontend\models\UserCountries;
use frontend\models\UserRules;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * UserSearch represents the model behind the search form about `frontend\models\User`.
 */
class UserSearch extends User
{
   /**
    * @inheritdoc
    */
   public function rules()
   {
      return [
         [
            [
               'id',
               'status',
               'country_id',
               'created_at',
               'updated_at',
               'company_id',
               'ebrd',
            ],
            'integer'],
         [['username', 'lastname', 'firstname', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'country_id', 'rule_id'], 'safe'],
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
      $query = User::find()
         ->from('user u')
         ->leftJoin(UserCountries::tableName() . ' uc', 'uc.user_id = u.id')
         ->leftJoin(UserRules::tableName() . ' ur', 'ur.user_id = u.id');

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
         'status' => $this->status,
         'created_at' => $this->created_at,
         'updated_at' => $this->updated_at,
         'ebrd' => $this->ebrd,
         'company_id' => $this->company_id,
      ]);

      $query
         ->andFilterWhere(['like', 'u.username', $this->username])
         ->andFilterWhere(['=', 'uc.country_id', $this->country_id])
         ->andFilterWhere(['=', 'ur.rule_id', $this->rule_id])
         ->andFilterWhere(['like', 'u.lastname', $this->lastname])
         ->andFilterWhere(['like', 'u.firstname', $this->firstname])
         ->andFilterWhere(['like', 'u.auth_key', $this->auth_key])
         ->andFilterWhere(['like', 'u.password_hash', $this->password_hash])
         ->andFilterWhere(['like', 'u.password_reset_token', $this->password_reset_token])
         ->andFilterWhere(['like', 'u.email', $this->email]);

      return $dataProvider;
   }
}
