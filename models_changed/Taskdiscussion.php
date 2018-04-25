<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "taskdiscussion".
 *
 * @property integer $id
 * @property integer $taskid
 * @property integer $commentby
 * @property string $comment
 * @property string $commentdate
 */
class Taskdiscussion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taskdiscussion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['taskid', 'commentby', 'comment'], 'required'],
            [['taskid', 'commentby'], 'integer'],
            [['commentdate'], 'safe'],
            [['comment'], 'string', 'max' => 100]
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
            'commentby' => 'Commentby',
            'comment' => 'Comment',
            'commentdate' => 'Commentdate',
        ];
    }
}
