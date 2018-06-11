<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $lastname
 * @property string $firstname
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $image_url
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer company_id
 * @property integer country_id
 * @property integer rule_id
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile sds
     */
    public $imageFile;

    public $group_id;

    public $country_id;

    public $rule_id;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This username has already been.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            [
                'username',
                'match', 'not' => true, 'pattern' => '/[^a-zA-Z0-9_.-]/',
                'message' => 'Invalid characters in username.',
            ],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => 'This email address has already been.'],

            ['password_hash', 'required'],
            ['password_hash', 'string', 'min' => 6],

            [['imageFile'], 'file', 'extensions' => 'png, jpg'],
            [['lastname', 'firstname', 'email'], 'required'],
            [['status', 'created_at', 'updated_at', 'company_id', 'group_id', 'country_id'], 'integer'],
            [['lastname', 'firstname', 'password_reset_token', 'email', 'image_url'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'User name',
            'lastname' => 'Last name',
            'firstname' => 'First name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'image_url' => 'Image',
            'company_id' => 'Company',
            'group_id' => 'group id',
        ];
    }


    /**
     * @return bool|string
     */
    public function upload()
    {
        if (!empty($this->imageFile)) {
            $img_name = microtime(true) . '.' . $this->imageFile->extension;
            if ($this->imageFile->saveAs('uploads/' . $img_name)) {
                return $img_name;
            }
        }
        return false;
    }

    /**
     * @return bool|int|mixed|string
     */
    public function SaveUser()
    {
        if (!$this->validate()) {
            return false;
        }
        $user = new \common\models\User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->image_url = $this->image_url;
        $user->status = $this->status;
        $user->setPassword($this->password_hash);
        return $user->save() ? $user->getId() : false;
    }

    /**
     * @param null $id
     * @return bool|int
     */
    public function UpdateUser($id = null)
    {
        if (!empty($id)) {
            if (!$this->validate()) {
                return false;
            }
            $user = self::findOne(['id' => $id]);
            $user->username = $this->username;
            $user->email = $this->email;
            $user->firstname = $this->firstname;
            $user->lastname = $this->lastname;
            $user->image_url = $this->image_url;
            $user->status = $this->status;
            $user->company_id = $this->company_id;
            return $user->save() ? $user->id : false;
        }
        return false;
    }

    /**
     * @return array
     */
    public static function GetUsers()
    {
        return self::find()->select(["CONCAT(`firstname`,' ',`lastname`) as name", 'id'])->indexBy('id')->column();
    }

    public static function GetAllUsersNotProject($project_id)
    {
        return self::find()
            ->where(['NOT IN', 'id', ProjectMembers::GetMembersByProjectId($project_id)])
            ->asArray()
            ->all();
    }

    /**
     * @param $id
     * @return static
     */
    public static function GetUserImage($id)
    {
        return self::findOne(['id' => $id]);
    }

    /**
     * @param $id
     * @return static
     */
    public static function GetUserById($id)
    {
        return self::findOne(['id' => $id]);
    }

    /**
     * @param $id
     * @return null
     */
    public function GetCompany($id)
    {
        return !empty(Companies::GetCompanyNameById($id)['name']) ? Companies::GetCompanyNameById($id)['name'] : null;
    }

    /**
     * @param $id
     * @return null
     */
    public function GetCountry($id)
    {
        return !empty(Countries::GetCountryNameById($id)['country_name']) ? Countries::GetCountryNameById($id)['country_name'] : null;
    }

    public static function GetAllUsers()
    {
        return self::find()->asArray()->all();
    }

    public static function GetUsersByIds($ids = null)
    {
        if (!empty($ids)) {
            return self::find()->where(['id' => $ids])->asArray()->all();
        }
        return [];
    }

    public function GetCountriesByUserId($user_id = null)
    {
        if (!empty($user_id)) {
            return UserCountries::GetCountryNameByUserId($user_id);
        }
        return [];
    }

    public static function DeleteUserPhoto($user_id = null)
    {
        if (!empty($user_id)) {
            $model = self::findOne(['id' => $user_id]);
            unlink(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['user_url'] . $model['image_url']);
            $model->image_url = null;
            return $model->save();
        }
        return false;
    }
}
