<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "taskroutine".
 *
 * @property integer $id
 * @property integer $taskid
 * @property string $frequency
 * @property string $nextdate
 *
 * @property Task $task
 */
class Taskroutine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taskroutine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['taskid', 'nextdate'], 'required'],
            [['taskid'], 'integer'],
            [['nextdate'], 'safe'],
            [['frequency'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'taskid' => 'Taskid',
            'frequency' => 'Frequency',
            'nextdate' => 'Nextdate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'taskid']);
    }
}
