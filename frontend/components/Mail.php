<?php
/**
 * Created by PhpStorm.
 * User: Armen
 * Date: 11/20/17
 * Time: 12:00 PM
 */

namespace frontend\components;

use frontend\models\ChecklistUsers;
use frontend\models\Companies;
use frontend\models\Countries;
use frontend\models\ProjectChecklists;
use frontend\models\ProjectCountries;
use frontend\models\Projects;
use frontend\models\User;
use yii\base\Component;

/**
 * Class CheckRules
 * @package frontend\components
 */
class Mail extends Component
{


    //Mail::SandMailByType($post['user_id'], $post['project_id'],$post['type']);

    /**
     * @param int $user_id
     * @param null $project_id
     * @param int $type
     * @return bool
     */
    public static function SandMailByType($user_id = 1, $project_id = null, $type = 1)
    {
        if (!empty($user_id) && !empty($project_id)) {
            $user = User::GetUserById($user_id);
            $project = Projects::GetProjectDataById($project_id);
            if ($type == 0) {
                return \Yii::$app->mailer
                    ->compose([
                        'html' => 'comment',
                        'text' => 'comment'
                    ], ['project' => $project])
                    ->setFrom([\Yii::$app->params['supportEmail'] => 'GrantThornton'])
                    ->setTo($user['email'])
                    ->setSubject('You were tagged in the comment')
                    ->send();
            } elseif ($type == 1) {
                return \Yii::$app->mailer
                    ->compose([
                        'html' => 'new-project-join',
                        'text' => 'new-project-join'
                    ], ['project' => $project])
                    ->setFrom([\Yii::$app->params['supportEmail'] => 'GT Pipeline'])
                    ->setTo($user['email'])
                    ->setSubject('Project assigned '.$project->project_code)
                    ->send();
            }
        }
        return true;
    }

    public static function SandMailAllUsers($project_id = null)
    {
        if (!empty($project_id)) {
            $users = User::GetAllUsers();
            $project = Projects::GetProjectDataById($project_id);
            $countries = ProjectCountries::GetCountriesNameByProjectIdString($project_id);
            foreach ($users as $user) {
                \Yii::$app->mailer
                    ->compose([
                        'html' => 'new-project',
                        'text' => 'new-project'
                    ], [
                        'project' => $project,
                        'countries' => $countries
                    ])
                    ->setFrom([\Yii::$app->params['supportEmail'] => 'GT Pipeline'])
                    ->setTo($user['email'])
                    ->setSubject('New project ' . $project->project_code . ' ' .$countries)
                    ->send();
            }
        }
        return true;
    }


    public static function SandMail($email = null, $title = '', $text = '')
    {
        return \Yii::$app
            ->mailer
            ->compose()
            ->setFrom([\Yii::$app->params['supportEmail'] => 'GT Pipeline'])
            ->setTo($email)
            ->setSubject($title)
            ->setTextBody($text)
            ->send();
    }
}