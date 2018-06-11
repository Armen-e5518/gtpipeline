<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user_rules".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $rule_id
 */
class UserRules extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_rules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'rule_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'rule_id' => 'Rule ID',
        ];
    }

    /**
     * @param $user_id
     * @return array
     */
    public static function GetUserRules($user_id)
    {
        if (!empty($user_id)) {
            return self::find()
                ->select('rule_kay , rn.id')
                ->leftJoin(RulesName::tableName() . ' rn', 'rn.id = ' . self::tableName() . '.rule_id AND ' . self::tableName() . '.user_id = ' . $user_id)
                ->indexBy('id')
                ->column();
        }
        return [];
    }

    /**
     * @param null $rules
     * @param null $user_id
     * @return bool
     */
    public static function SaveRulesByUserId($rule_id = null, $user_id = null)
    {
        self::deleteAll(['user_id' => $user_id]);
        if (!empty($rule_id) && !empty($user_id)) {
            $model = new self();
            $model->user_id = $user_id;
            $model->rule_id = $rule_id;
            return $model->save();

        }
        return true;
    }


    /**
     * @param null $user_id
     * @return array
     */
    public static function GetUserRulesByUserId($user_id = null)
    {
        if (!empty($user_id)) {
            return self::find()->select('rule_id')->where(['user_id' => $user_id])->column();
        }
        return [];
    }

    /**
     * @param null $user_id
     * @return array
     */
    public static function GetUserRulesNamesByUserId($user_id = null)
    {
        if (!empty($user_id)) {
            return self::find()
                ->select('rn.name')
                ->rightJoin(RulesName::tableName() . ' rn', 'rn.id = ' . self::tableName() . '.rule_id')
                ->where([self::tableName() . '.user_id' => $user_id])
                ->column();
        }
        return [];
    }
}
