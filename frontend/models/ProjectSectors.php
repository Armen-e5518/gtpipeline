<?php

namespace frontend\models;

/**
 * This is the model class for table "project_sectors".
 *
 * @property integer $id
 * @property string $name
 */
class ProjectSectors extends \yii\db\ActiveRecord
{
   /**
    * @inheritdoc
    */
   public static function tableName()
   {
      return 'project_sectors';
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

   public static function getAll()
   {
      return self::find()->select(['name', 'id'])->indexBy('id')->column();
   }
}
