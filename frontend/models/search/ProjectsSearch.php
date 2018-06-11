<?php

namespace frontend\models\search;

use frontend\models\Industrys;
use frontend\models\Services;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Projects;

/**
 * ProjectsSearch represents the model behind the search form about `frontend\models\Projects`.
 */
class ProjectsSearch extends Projects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'state'], 'integer'],
            [
                [
                    'ifi_name',
                    'name_firm',
                    'client_name',
                    'project_name',
                    'location_within_country',
                    'project_dec',
                    'tender_stage',
                    'request_issued',
                    'deadline',
                    'budget',
                    'duration',
                    'eligibility_restrictions',
                    'selection_method',
                    'submission_method',
                    'evaluation_decision_making',
                    'beneficiary_stakeholder',
                    'created_at',
                    'updated_at',
                    'project_value',
                    'consultants',
                    'lead_partner',
                    'partner_contact',
                    'industry_id',
                    'service_id',
                ],
                'safe'
            ],
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
        $query = Projects::find()
            ->from('projects p ')
            ->leftJoin(Industrys::tableName() . ' i', 'i.id = p.industry_id')
            ->leftJoin(Services::tableName() . ' s', 's.id = p.service_id');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'name_firm',
                'client_name',
                'project_name',
                'location_within_country',
                'budget',
                'product_price',
                'project_value',
                'consultants',
                'lead_partner',
                'partner_contact',
                'status',
                'industry_id',
                'service_id',
            ],
            'defaultOrder' => [
                'name_firm' => SORT_DESC,
            ]
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
            'state' => $this->state,
            'name_firm' => $this->name_firm,
            'budget' => $this->budget,
            'partner_contact' => $this->partner_contact,
            'lead_partner' => $this->lead_partner,
            'consultants' => $this->consultants,
            'location_within_country' => $this->location_within_country,
            'project_value' => $this->project_value,

        ]);

        $query
            ->andFilterWhere(['like', 'p.ifi_name', $this->ifi_name])
            ->andFilterWhere(['like', 'p.name_firm', $this->name_firm])
            ->andFilterWhere(['like', 'i.id', $this->industry_id])
            ->andFilterWhere(['like', 's.id', $this->service_id])
            ->andFilterWhere(['like', 'p.client_name', $this->client_name])
            ->andFilterWhere(['like', 'p.budget', $this->budget])
            ->andFilterWhere(['like', 'p.partner_contact', $this->partner_contact])
            ->andFilterWhere(['like', 'p.lead_partner', $this->lead_partner])
            ->andFilterWhere(['like', 'p.consultants', $this->consultants])
            ->andFilterWhere(['like', 'p.project_value', $this->project_value])
            ->andFilterWhere(['like', 'p.location_within_country', $this->location_within_country])
            ->andFilterWhere(['like', 'p.project_name', $this->project_name])
            ->andFilterWhere(['like', 'p.project_dec', $this->project_dec])
            ->andFilterWhere(['like', 'p.tender_stage', $this->tender_stage])
            ->andFilterWhere(['like', 'p.request_issued', $this->request_issued])
            ->andFilterWhere(['like', 'p.deadline', $this->deadline])
            ->andFilterWhere(['like', 'p.budget', $this->budget])
            ->andFilterWhere(['like', 'p.duration', $this->duration])
            ->andFilterWhere(['like', 'p.eligibility_restrictions', $this->eligibility_restrictions])
            ->andFilterWhere(['like', 'p.selection_method', $this->selection_method])
            ->andFilterWhere(['like', 'p.submission_method', $this->submission_method])
            ->andFilterWhere(['like', 'p.evaluation_decision_making', $this->evaluation_decision_making])
            ->andFilterWhere(['like', 'p.beneficiary_stakeholder', $this->beneficiary_stakeholder]);

        return $dataProvider;
    }
}
