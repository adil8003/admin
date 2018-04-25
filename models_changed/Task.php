<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $tasktypeid
 * @property integer $taskpriorityid
 * @property integer $createdby
 * @property integer $assignedto
 * @property string $createddate
 * @property integer $taskstatusid
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'tasktypeid', 'taskpriorityid', 'createdby', 'assignedto', 'taskstatusid'], 'required'],
            [['description'], 'string'],
            [['tasktypeid', 'taskpriorityid', 'createdby', 'assignedto', 'taskstatusid'], 'integer'],
            [['createddate'], 'safe'],
            [['title'], 'string', 'max' => 700]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'tasktypeid' => 'Tasktypeid',
            'taskpriorityid' => 'Taskpriorityid',
            'createdby' => 'Createdby',
            'assignedto' => 'Assignedto',
            'createddate' => 'Createddate',
            'taskstatusid' => 'Taskstatusid',
        ];
    }
}
