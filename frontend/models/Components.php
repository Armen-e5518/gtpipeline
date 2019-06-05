<?php

namespace frontend\models;

/**
 * This is the model class for table "components".
 *
 * @property integer $id
 * @property string $name
 */
class Components extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'components';
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
   public static function GetComponents()
   {
      return self::find()->select(["name", 'id'])->indexBy('id')->column();
   }
}
