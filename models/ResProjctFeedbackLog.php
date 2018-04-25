<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resProjctFeedbackLog".
 *
 * @property integer $id
 * @property integer $resProjctFeedbackId
 * @property string $description
 * @property string $usertype
 * @property integer $userid
 * @property string $datetime
 */
class ResProjctFeedbackLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resProjctFeedbackLog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resProjctFeedbackId', 'description', 'usertype', 'userid'], 'required'],
            [['resProjctFeedbackId', 'userid'], 'integer'],
            [['datetime'], 'safe'],
            [['description'], 'string', 'max' => 700],
            [['usertype'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'resProjctFeedbackId' => 'Res Projct Feedback ID',
            'description' => 'Description',
            'usertype' => 'Usertype',
            'userid' => 'Userid',
            'datetime' => 'Datetime',
        ];
    }
}
