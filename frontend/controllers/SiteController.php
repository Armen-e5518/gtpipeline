<?php
namespace frontend\controllers;

use frontend\components\Helper;
use frontend\models\Assignments;
use frontend\models\Countries;
use frontend\models\Industrys;
use frontend\models\ProjectComments;
use frontend\models\ProjectFavorite;
use frontend\models\ProjectMembers;
use frontend\models\Projects;
use frontend\models\Services;
use frontend\models\User;
use phpDocumentor\Reflection\Project;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\Cookie;

/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [
                            'login',
                            'error',
                            'request-password-reset',
                            'reset-password',
                            'test',
                            'css',
                            'projects',
                        ],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $cookies = Yii::$app->response->cookies;
        $get = Yii::$app->request->get();
        if (!empty($get)) {
            $cookies->add(new Cookie([
                'name' => 'gt_filter',
                'value' => $get,
            ]));
        } else {
            $cookies_g = Yii::$app->request->cookies;
            $get = !empty($cookies_g->getValue('gt_filter')) ? $cookies_g->getValue('gt_filter') : [];
        }
//        Helper::dd(Helper::GetFilterResets(['/site/index'], $get));
//        exit;
        $projects = Projects::GetAllProjectsUsers($get);
        return $this->render('index', [
//            'date' => Helper::ChangeProjectsFormat($projects),
            'favorites' => ProjectFavorite::GetFavoritesByUserId(),
            'params' => Helper::GetFilterResets(['/site/index'], $get),
            'stats' => Projects::IMPORTANT,
            'countries' => Countries::GetCountries(),
            'services' => Services::GetServices(),
            'industries' => Industrys::GetIndustrys(),
            'assignments' => Assignments::GetAssignments(),
            'users' => User::GetUsers(),
            'get' => $get,
            '$projects' => $projects,
        ]);
    }

    public function actionProjects()
    {
        $cookies = Yii::$app->request->cookies;
        $get = !empty($cookies->getValue('gt_filter')) ? $cookies->getValue('gt_filter') : ['pending_approval' => 'on'];
        array_unshift($get, '/');
        $this->redirect($get);
    }

    public function actionTest()
    {
        $a = [
        ];
        foreach ($a as $b) {
            $model = new Assignments();
            $model->name = $b;
            $model->save();
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionCss($css)
    {
        $file = $target_dir = \Yii::$app->basePath . '/web/main/assets/css/' . $css;
        $post = Yii::$app->request->post();
        if ($post) {
            file_put_contents($file, $post['css']);
        }
        return $this->render('css', [
            'data' => file_get_contents($file)
        ]);
    }
}
