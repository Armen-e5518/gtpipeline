<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "users_grupes".
 *
 * @property integer $id
 * @property integer $grup_id
 * @property integer $user_id
 */
class UsersGrupes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users_grupes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['grup_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'grup_id' => 'Grup ID',
            'user_id' => 'User ID',
        ];
    }

    public static function SaveGroupByUserId($group_ids = null, $user_id = null)
    {
        $flag = true;
        if (!empty($group_ids) && !empty($user_id)) {
            foreach ($group_ids as $group_id) {
                self::deleteAll(['grup_id' => $group_id,'user_id' => $user_id]);
                $model = new self();
                $model->grup_id = $group_id;
                $model->user_id = $user_id;
                if (!$model->save()) {
                    $flag = false;
                }
            }
        }
        return $flag;
    }

    public static function GetUsersByGroupId($id)
    {
        if (!empty($id)) {
            return self::find()
                ->select(['CONCAT(u.firstname, " ", u.lastname ) as name'])
                ->rightJoin(User::tableName() . ' u', 'u.id = ' . self::tableName() . '.user_id')
                ->where([self::tableName() . '.grup_id' => $id])
                ->column();
        }
        return [];
    }

    public static function SaveUsersByGroupsId($grup_id, $users)
    {
        $flag = true;
        self::deleteAll(['grup_id' => $grup_id]);
        if (!empty($grup_id) && !empty($users)) {
            foreach ($users as $user_id) {
                $model = new self();
                $model->grup_id = $grup_id;
                $model->user_id = $user_id;
                if (!$model->save()) {
                    $flag = false;
                }
            }
        }
        return $flag;
    }

    public static function GetUsersIdByGroupId($grup_id = null)
    {
        if (!empty($grup_id)) {
            return self::find()->select('user_id')->where(['grup_id' => $grup_id])->column();
        }
        return [];
    }

    public static function GetGroupsIdByUserId($user_id = null)
    {
        if (!empty($user_id)) {
            return self::find()->select('grup_id')->where(['user_id' => $user_id])->groupBy('grup_id')->column();
        }
        return [];
    }
}
