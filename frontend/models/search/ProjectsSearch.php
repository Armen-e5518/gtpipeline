<?php

namespace frontend\models\search;

use frontend\components\Helper;
use frontend\models\Countries;
use frontend\models\Industrys;
use frontend\models\ProjectCountries;
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
            [['id', 'status', 'state','service_line','project_components','country'], 'integer'],
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
                    'project_code',
                    'budget_int',
                    'services_value',
                    'project_sectors',
                    'financed_by',

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

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'name_firm',
                'client_name',
                'project_name',
                'location_within_country',
                'country',
                'budget',
                'product_price',
                'project_value',
                'consultants',
                'lead_partner',
                'partner_contact',
                'status',
                'industry_id',
                'service_id',
                'project_code',
                'service_line',
                'financed_by',
            ],
            'defaultOrder' => [
                'name_firm' => SORT_DESC,
            ]
        ]);
        $this->load($params);
        if ($this->country) {
            $query->leftJoin(ProjectCountries::tableName() . ' pc', 'p.id = pc.project_id')
                ->leftJoin(Countries::tableName() . ' c', 'c.id = pc.country_id')
                ->andWhere(['c.id' => $this->country])
                ->groupBy('p.id');
        }
        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'state' => $this->state,
            'name_firm' => $this->name_firm,
            'partner_contact' => $this->partner_contact,
            'lead_partner' => $this->lead_partner,
            'service_line' => $this->service_line,
            'project_value' => $this->project_value,

        ]);

        if (!empty($this->budget)) {
            $q = Helper::GetNumericQuery($this->budget);
            if (!empty($q)) {
                $query->andFilterWhere([$q['kay'], 'p.budget_int', (int)$q['val']]);
            } else {
                $query->andFilterWhere(['like', 'p.budget', $this->budget]);
            }
        }
        $query
            ->andFilterWhere(['like', 'p.project_code', $this->project_code])
            ->andFilterWhere(['like', 'p.ifi_name', $this->ifi_name])
            ->andFilterWhere(['like', 'p.project_sectors', $this->project_sectors])
            ->andFilterWhere(['like', 'p.name_firm', $this->name_firm])
            ->andFilterWhere(['like', 'p.services_value', $this->services_value])
            ->andFilterWhere(['like', 'i.id', $this->industry_id])
            ->andFilterWhere(['like', 's.id', $this->service_id])
            ->andFilterWhere(['like', 'p.client_name', $this->client_name])
            ->andFilterWhere(['like', 'p.partner_contact', $this->partner_contact])
            ->andFilterWhere(['like', 'p.lead_partner', $this->lead_partner])
            ->andFilterWhere(['like', 'p.consultants', $this->consultants])
            ->andFilterWhere(['like', 'p.financed_by', $this->financed_by])
            ->andFilterWhere(['like', 'p.project_value', $this->project_value])
            ->andFilterWhere(['like', 'p.project_name', $this->project_name])
            ->andFilterWhere(['like', 'p.project_dec', $this->project_dec])
            ->andFilterWhere(['like', 'p.tender_stage', $this->tender_stage])
            ->andFilterWhere(['like', 'p.request_issued', $this->request_issued])
            ->andFilterWhere(['like', 'p.deadline', $this->deadline])
            ->andFilterWhere(['like', 'p.duration', $this->duration])
            ->andFilterWhere(['like', 'p.eligibility_restrictions', $this->eligibility_restrictions])
            ->andFilterWhere(['like', 'p.selection_method', $this->selection_method])
            ->andFilterWhere(['like', 'p.submission_method', $this->submission_method])
            ->andFilterWhere(['like', 'p.evaluation_decision_making', $this->evaluation_decision_making])
            ->andFilterWhere(['like', 'p.location_within_country', $this->location_within_country])
            ->andFilterWhere(['like', 'p.project_components', $this->project_components])
            ->andFilterWhere(['like', 'p.beneficiary_stakeholder', $this->beneficiary_stakeholder]);

        return $dataProvider;
    }
}



