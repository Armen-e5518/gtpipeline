<?php

namespace frontend\controllers;

use frontend\components\Helper;
use frontend\components\Mail;
use frontend\models\ProjectAttachments;
use frontend\models\ProjectChecklists;
use frontend\models\ProjectComments;
use frontend\models\ProjectCountries;
use frontend\models\ProjectFavorite;
use frontend\models\ProjectMembers;
use frontend\models\Projects;
use frontend\models\User;
use frontend\models\UserNotifications;
use frontend\models\UsersGrup;
use Yii;
use yii\web\Controller;
use \yii\web\Response;


/**
 * UserController implements the CRUD actions for User model.
 */
class AjaxController extends Controller
{

    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            return 'Not login';
        }
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionGetParams()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return Yii::$app->params;
        }
    }

    public function actionDeleteAttachmentById()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ProjectAttachments::DeleteAttachmentById($post['id']);
            }
        }
    }

    public function actionAddOrDeleteFavorite()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ProjectFavorite::SaveOrDeleteFavorite($post['id']);
            }
        }
    }

    public function actionGetUserImage()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return User::GetUserImage($post['id']);
            }
        }
    }

    public function actionGetProjectDataById()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();

            if (!empty($post)) {
                if (Yii::$app->rule_check->CheckByKay(['super_admin'])
                    || in_array($post['id'], Projects::GetOpenProjectIds())
                    || in_array($post['id'], Projects::GetOpenProjectIdsByAppr())
                ) {
                    return Projects::GetProjectDataById($post['id']);
                }
            }
        }
        return 0;
    }

    public function actionGetMembersDataByProjectId()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ProjectMembers::GetMembersByProjectIdAllData($post['id']);
            }
        }
    }

    public function actionGetAttachmentsByProjectId()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ProjectAttachments::GetAttachmentsByProjectId($post['id']);
            }
        }
    }

    public function actionGetCountriesByProjectId()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ProjectCountries::GetCountriesByProjectIdAllData($post['id']);
            }
        }
    }

    public function actionGetMembersNotProject()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return User::GetAllUsersNotProject($post['id']);
            }
        }
    }

    public function actionSaveMemberByProjectId()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ProjectMembers::SaveMemberByProjectId($post);
            }
        }
    }

    public function actionSaveProjectTitle()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return Projects::SaveProjectTitle($post);
            }
        }
    }

    public function actionSaveProjectDescription()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return Projects::SaveProjectDescription($post);
            }
        }
    }

    public function actionSaveProjectComment()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ProjectComments::SaveProjectComment($post);
            }
        }
    }

    public function actionGetCommentsByProjectId()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ProjectComments::GetCommentsByProjectId($post['id']);
            }
        }
    }

    public function actionGetAllUsers()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return User::GetAllUsers();
        }
    }

    public function actionGetAllUsersGroups()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return UsersGrup::GetGroupsForJS();
        }
    }

    public function actionSaveChecklistByProjectId()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ProjectChecklists::SaveChecklistByProjectId($post);
            }
        }
    }

    public function actionGetChecklistsByProjectId()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return [
                    'res' => Helper::GetChecklist($post['project_id']),
                    'permission' => Projects::GetProjectRules($post['project_id']),
                    'user_id' => Yii::$app->user->getId(),
                ];
            }
        }
    }

    public function actionSaveChecklistStatus()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ProjectChecklists::ChangeChecklistStatus($post['id']);
            }
        }
    }

    public function actionSaveChangeStatus()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return Projects::ChangeProjectStatus($post);
            }
        }
    }

    public function actionDeleteProjectMember()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ProjectMembers::DeleteProjectMember($post['project_id'], $post['user_id']);
            }
        }
    }

    public function actionUpdateProjectsList()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_HTML;
            $post = Yii::$app->request->post();
            $this->layout = false;
            return $this->render('projects', [
                'get' => $post
            ]);
        }
    }

    public function actionDeleteChecklistById()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return ProjectChecklists::DeleteChecklistById($post['id']);
            }
        }
    }

    public function actionGetCurrentUserNotifications()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            return UserNotifications::GetCurrentUserNotifications();
        }
    }

    public function actionReadNotification()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return UserNotifications::ReadNotification($post['id']);
            }
        }
    }

    public function actionAddNewNotification()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                Mail::SandMailByType($post['user_id'], $post['project_id'], $post['type']);
                return UserNotifications::AddNewNotificationInUser($post['user_id'], $post['project_id'], $post['type']);
            }
        }
    }

    public function actionSaveSubmittedData()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return Projects::SaveSubmittedData($post);
            }
        }
    }

    public function actionSaveAcceptedData()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return Projects::SaveAcceptedData($post);
            }
        }
    }

    public function actionDeleteUserPhoto()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return User::DeleteUserPhoto($post['id']);
            }
        }
    }

    public function actionAddArchive()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return Projects::ChangeStatusToArchive($post['id']);
            }
        }
    }

    public function actionDeleteProject()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return Projects::DeleteProject($post['id']);
            }
        }
    }

    public function actionGetProjectRules()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return Projects::GetProjectRules($post['id']);
            }
        }
    }

    public function actionSaveModerator()
    {
        if (Yii::$app->request->isAjax) {
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $post = Yii::$app->request->post();
            if (!empty($post)) {
                return Projects::SaveModerator($post['user_id'], $post['project_id']);
            }
        }
    }
}
