<?php

namespace frontend\models;

use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Yii;

/**
 * This is the model class for table "project_groups".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $group_id
 */
class ProjectGroups extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'group_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'group_id' => 'Group ID',
        ];
    }

    public static function SaveGroupsByProjectId($project_id = null, $group_ids = null)
    {
        $flag = true;
        self::deleteAll(['project_id' => $project_id]);
        if (!empty($project_id) && !empty($group_ids)) {
            foreach ($group_ids as $g) {
                $model = new self();
                $model->project_id = $project_id;
                $model->group_id = $g;
                if (!$model->save()) {
                    $flag = false;
                }
            }
            Projects::SaveGroupsFlag($project_id, 1);
        } elseif (empty($group_ids)) {
            Projects::SaveGroupsFlag($project_id, 0);
        }
        return $flag;
    }

    public static function GetGroupsByProjectId($project_id = null)
    {
        if (!empty($project_id)) {
            return self::find()->select('group_id')->where(['project_id' => $project_id])->column();
        }
        return [];
    }

    public static function GetProjectIdsByUserId($user_id)
    {
        $query = (new \yii\db\Query())
            ->select(
                [
                    'pg.project_id',
                ])
            ->from('project_groups as pg')
            ->leftJoin(UsersGrupes::tableName() . ' ug', 'ug.grup_id = pg.group_id AND ug.user_id = ' . $user_id);
        return $query
            ->groupBy('pg.project_id')
            ->column();
    }
}
