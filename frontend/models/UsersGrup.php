<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "users_grup".
 *
 * @property integer $id
 * @property string $name
 */
class UsersGrup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users_grup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public static function GetGroups()
    {
        return self::find()->select(["name", 'id'])->indexBy('id')->column();
    }

    public function GetUsersByGroupId($group_id = null)
    {
        if (!empty($group_id)) {
            return UsersGrupes::GetUsersByGroupId($group_id);
        }
        return [];
    }
}
