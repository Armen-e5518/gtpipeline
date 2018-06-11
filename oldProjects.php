<?php

namespace frontend\models;

use kartik\helpers\Html;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property string $ifi_name
 * @property string $project_name
 * @property string $project_dec
 * @property string $tender_stage
 * @property string $request_issued
 * @property string $deadline
 * @property string $budget
 * @property string $duration
 * @property string $eligibility_restrictions
 * @property string $selection_method
 * @property string $submission_method
 * @property string $evaluation_decision_making
 * @property string $beneficiary_stakeholder
 * @property integer $status
 * @property integer $state
 * @property integer $grup_id
 * @property integer $status_important
 * @property integer $submitted
 * @property string $create_de
 * @property string $update_de
 * @property string $client_name
 * @property string $project_value
 * @property string $industry_id
 * @property string $service_id
 * @property string $consultants
 * @property string $lead_partner
 * @property string $partner_contact
 * @property string $location_within_country
 * @property string $address_client
 * @property string $duration_assignment
 * @property string $staff_months
 * @property string $services_value
 * @property string $start_date
 * @property string $completion_date
 * @property string $name_senior_professional
 * @property string $assignment_id
 * @property string $proportion
 * @property string $no_professional_staff
 * @property string $no_provided_staff
 * @property string $narrative_description
 * @property string $actual_services_description
 * @property string $GetIndustryById
 * @property string $name_firm
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile[]
     */
    public $attachments;

    const STATUS_ARCHIVE = 2;

    const STATUS_ACTIVE = 1;

    const STATUS_DELETE = 0;

    const STATUS = [
        0 => "Pending approval",
        1 => "In progress",
        2 => "Submitted",
        3 => "Accepted",
        4 => "Dismiss",
        5 => "Rejected",
    ];

    const IMPORTANT = [
        0 => "Important 1",
        1 => "Important 2",
        2 => "Important 3",

    ];

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attachments'], 'file'],
            [['ifi_name', 'project_name', 'deadline', 'request_issued'], 'required'],
            [['tender_stage', 'project_dec'], 'string'],
            [['status', 'state', 'importance_1', 'importance_2', 'importance_3', 'international_status','grup_id'], 'integer'],
            [['industry_id', 'service_id', 'assignment_id', 'staff_months', 'proportion', 'no_professional_staff', 'no_provided_staff'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['ifi_name', 'project_name', 'request_issued', 'deadline', 'budget', 'duration', 'eligibility_restrictions', 'selection_method', 'submission_method', 'evaluation_decision_making', 'beneficiary_stakeholder'], 'string', 'max' => 255],
            [['client_name', 'project_value', 'consultants', 'lead_partner', 'partner_contact', 'location_within_country', 'address_client', 'duration_assignment', 'services_value', 'start_date', 'completion_date'], 'string', 'max' => 255],
            [['name_senior_professional', 'actual_services_description', 'name_firm'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'grup_id' => 'Users Group',
            'ifi_name' => 'Ifi Name',
            'project_name' => 'Project Name',
            'name_firm' => 'Name of Firm',
            'project_dec' => 'Project Dec',
            'tender_stage' => 'Tender Stage',
            'request_issued' => 'Request Issued',
            'deadline' => 'Deadline',
            'budget' => 'Budget',
            'duration' => 'Duration',
            'eligibility_restrictions' => 'Eligibility Restrictions',
            'selection_method' => 'Selection Method',
            'submission_method' => 'Submission Method',
            'evaluation_decision_making' => 'Evaluation Decision Making',
            'beneficiary_stakeholder' => 'Beneficiary Stakeholder',
            'status' => 'Status',
            'state' => 'State',
            'create_de' => 'Create De',
            'update_de' => 'Update De',
            'importance_1' => 'Important',
            'importance_2' => 'Most important',
            'importance_3' => 'More important',
            'international_status' => 'International / open for non residents',

            'client_name' => 'Client name',
            'project_value' => 'Project value',
            'industry_id' => 'Industry',
            'service_id' => 'Service line',
            'consultants' => 'Associated consultants, if any ',
            'lead_partner' => 'Lead partner ',
            'partner_contact' => 'Partner contact',
            'location_within_country' => 'Location within country',

            'address_client' => 'Address of Client',
            'duration_assignment' => 'Duration of assignment (months)',
            'staff_months' => 'Total No. of staff-months of the assignment', //int
            'services_value' => 'Approx. value of the services provided by the firm under the contract (in current US$ or Euro)',
            'start_date' => 'Start date (month/year)',
            'completion_date' => 'Completion date (month/year) ',
            'name_senior_professional' => 'Name of senior professional staff of your firm involved and functions performed(indicate most significant profiles such as ProjectDirector/Coordinator,Team Leader) ',
            'assignment_id' => 'Role on the Assignment ', //int
            'proportion' => 'Proportion carried out by the firm, % ', //int
            'no_professional_staff' => 'No. of professional staff-months provided by associated consultants ', //int
            'no_provided_staff' => 'No of staff provided by the firm ', //int
            'narrative_description' => 'Narrative description of project ',
            'actual_services_description' => 'Description of actual services provided by your staff within the assignment ',
        ];
    }

    /**
     * @return array
     */
    public static function GetAllProjectsAllJoin()
    {
        return (new \yii\db\Query())
            ->select(
                [
                    'p.*',
                    'c.country_name',
                    'u.firstname',
                    'u.lastname',
                ])
            ->from('projects as p')
            ->leftJoin(ProjectCountries::tableName() . ' pc', 'pc.project_id = p.id')
            ->leftJoin(Countries::tableName() . ' c', 'c.id = pc.country_id')
            ->leftJoin(ProjectMembers::tableName() . ' pm', 'pm.project_id = pc.id')
            ->leftJoin(User::tableName() . ' u', 'u.id = pm.user_id')
            ->all();
    }

    /**
     * @param null $params
     * @return array
     */
    public static function GetAllProjects($params = null)
    {
        $query = (new \yii\db\Query())
            ->select(
                [
                    'p.*',
                ])
            ->from('projects as p');
//            ->leftJoin(ProjectCountries::tableName() . ' pce', 'pce.project_id = p.id AND pce.country_id = ' . Yii::$app->user->identity->country_id)
//            ->leftJoin(ProjectCountries::tableName() . ' pce', 'pce.project_id = p.id AND pce.country_id IN (' . UserCountries::GetCountriesByUserIdByImplode() . ')')
//            ->leftJoin(ProjectMembers::tableName() . ' pme', 'pme.project_id = p.id AND pme.user_id = ' . Yii::$app->user->identity->getId())
//            ->andFilterWhere(['OR',
//                ['pme.id IS not null'],
//                ['not', ['pme.id' => null]],
//                ['IS NOT', 'pme.id', (new Expression('Null'))],
//                ['IS NOT', 'pce.id', (new Expression('Null'))],
//                ['not', ['pce.id' => null]],
//                ['pce.id IS not null'],
//                ['is not', 'pce.id', null]
//            ]);
//        WHERE pm.id IS not null or pc.id  is not null
        if (!empty($params['a'])) {
            $query->andWhere(['p.state' => self::STATUS_ARCHIVE]);
        } else {
            $query->andWhere(['p.state' => self::STATUS_ACTIVE]);
        }
        if (!empty($params['f'])) {
            $query->rightJoin(ProjectFavorite::tableName() . ' f', 'f.project_id = p.id AND f.user_id = ' . Yii::$app->user->identity->getId());
        }
        if (
            !empty($params['pending_approval'])
            || !empty($params['in_progress'])
            || !empty($params['submitted'])
            || !empty($params['accepted'])
            || !empty($params['rejected'])
            || !empty($params['closed'])
        ) {
            $q = ['OR'];

            if (!empty($params['pending_approval'])) {
                array_push($q, ['p.status' => 0]);
            }
            if (!empty($params['in_progress'])) {
                array_push($q, ['p.status' => 1]);
            }
            if (!empty($params['submitted'])) {
                array_push($q, ['p.status' => 2]);
            }
            if (!empty($params['accepted'])) {
                array_push($q, ['p.status' => 3]);
            }
            if (!empty($params['rejected'])) {
                array_push($q, ['p.status' => 4]);
            }
            if (!empty($params['closed'])) {
                array_push($q, ['p.status' => 5]);
            }
            $query->andFilterWhere($q);
        }
        if (!empty($params['country'])) {
            $query->andWhere(['pce.country_id' => $params['country']]);
        }
        if (!empty($params['deadline_from']) && !empty($params['deadline_to'])) {
            $query->andWhere(['between', 'p.deadline', $params['deadline_from'], $params['deadline_to']]);
        } else {
            if (!empty($params['deadline_from'])) {
                $query->andWhere(['>', 'p.deadline', $params['deadline_from']]);
            }
            if (!empty($params['deadline_to'])) {
                $query->andWhere(['<', 'p.deadline', $params['deadline_to']]);
            }
        }

        return $query
            ->groupBy('p.id')
            ->orderBy(['p.deadline' => SORT_DESC])
            ->all();
    }

    /**
     * @param $id
     * @return bool
     */
    public static function ChangeStatusToArchive($id)
    {
        $model = self::findOne(['id' => $id]);
        if (!empty($model)) {
            $model->state = self::STATUS_ARCHIVE;
            return $model->save();
        }
        return false;
    }

    /**
     * @param $id
     * @return static
     */
    public static function GetProjectDataById($id)
    {
        return self::findOne(['id' => $id]);
    }

    /**
     * @param $post
     * @return bool
     */
    public static function SaveProjectTitle($post)
    {
        if (!empty($post['project_id'])) {
            $model = self::findOne(['id' => $post['project_id']]);
            $model->ifi_name = Html::encode($post['text']);
            return $model->save();
        }
        return false;
    }

    /**
     * @param $post
     * @return bool
     */
    public static function SaveProjectDescription($post = null)
    {
        if (!empty($post['project_id'])) {
            $model = self::findOne(['id' => $post['project_id']]);
            $model->project_dec = Html::encode($post['text']);
            return $model->save();
        }
        return false;
    }

    /**
     * @param $post
     * @return bool
     */
    public static function ChangeProjectStatus($post = null)
    {
        if (!empty($post['project_id']) && !empty($post['status'])) {
            $model = self::findOne(['id' => $post['project_id']]);
            $model->status = (int)$post['status'];
            return $model->save();
        }
        return false;
    }

    /**
     * @param null $kay
     * @return mixed
     */
    public function GetSatusTitelByKay($kay = null)
    {
        return self::STATUS[$kay];
    }

    /**
     * @param null $kay
     * @return string
     */
    public function GetProductState($kay = null)
    {
//        if($kay == 0){
//            return 'Deleted';
//        }
        if ($kay == 1) {
            return 'Active';
        }
        if ($kay == 2) {
            return 'Archive';
        }
        return '';
    }

    public static function SaveSubmittedData($data = null)
    {
        if (!empty($data)) {
            $model = self::findOne(['id' => $data['project_id']]);
            $model->client_name = !empty($data['client_name']) ? $data['client_name'] : null;
            $model->project_value = !empty($data['project_value']) ? $data['project_value'] : null;
            $model->industry_id = !empty($data['industry_id']) ? (int)$data['industry_id'] : null;
            $model->service_id = !empty($data['service_id']) ? (int)$data['service_id'] : null;
            $model->consultants = !empty($data['consultants']) ? $data['consultants'] : null;
            $model->lead_partner = !empty($data['lead_partner']) ? $data['lead_partner'] : null;
            $model->partner_contact = !empty($data['partner_contact']) ? $data['partner_contact'] : null;
            $model->location_within_country = !empty($data['location_within_country']) ? $data['location_within_country'] : null;
            return $model->save();
        }
        return false;
    }

    public static function SaveAcceptedData($data = null)
    {
        if (!empty($data)) {
            $model = self::findOne(['id' => $data['project_id']]);
            $model->address_client = !empty($data['address_client']) ? $data['address_client'] : null;
            $model->duration_assignment = !empty($data['duration_assignment']) ? $data['duration_assignment'] : null;
            $model->staff_months = !empty($data['staff_months']) ? $data['staff_months'] : null;
            $model->services_value = !empty($data['services_value']) ? $data['services_value'] : null;
            $model->start_date = !empty($data['start_date']) ? $data['start_date'] : null;
            $model->completion_date = !empty($data['completion_date']) ? $data['completion_date'] : null;
            $model->name_senior_professional = !empty($data['name_senior_professional']) ? $data['name_senior_professional'] : null;
            $model->assignment_id = !empty($data['assignment_id']) ? (int)$data['assignment_id'] : null;
            $model->proportion = !empty($data['proportion']) ? $data['proportion'] : null;
            $model->no_professional_staff = !empty($data['no_professional_staff']) ? $data['no_professional_staff'] : null;
            $model->no_provided_staff = !empty($data['no_provided_staff']) ? $data['no_provided_staff'] : null;
            $model->narrative_description = !empty($data['narrative_description']) ? $data['narrative_description'] : null;
            $model->actual_services_description = !empty($data['actual_services_description']) ? $data['actual_services_description'] : null;
            if ($model->save()) {
                return true;
            } else {
                return $model->getErrors();
            }
        }
        return false;
    }

    /**
     * @param null $industry_id
     * @return null
     */
    public function GetIndustryById($industry_id = null)
    {
        if (!empty($industry_id)) {
            return Industrys::GetIndustryById($industry_id)['name'];
        }
        return null;
    }

    public function GetServiceById($service_id = null)
    {
        if (!empty($service_id)) {
            return Services::GetServiceById($service_id)['name'];
        }
        return null;
    }

    public function GetStatus($id)
    {
        return self::STATUS[$id];
    }

    public function GetCountriesByProjectId($id)
    {
        if (!empty($id)) {
            return implode(',', ProjectCountries::GetCountriesNameByProjectIdAllData($id));
        }
        return null;
    }

    public function GetAssignmentById($assignment_id = null)
    {
        if (!empty($assignment_id)) {
            return Assignments::GetAssignmentById($assignment_id)['name'];
        }
        return null;
    }

    public static function DeleteProject($id)
    {
        $model = self::findOne(['id' => $id]);
        if (!empty($model)) {
            $model->state = self::STATUS_DELETE;
            return $model->save();
        }
        return false;
    }
}
