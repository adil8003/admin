<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resprojctfeedbacklog".
 *
 * @property integer $id
 * @property integer $resprojctfeedbackId
 * @property string $description
 * @property string $usertype
 * @property integer $userid
 * @property string $datetime
 */
class Resprojctfeedbacklog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resprojctfeedbacklog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resprojctfeedbackId', 'description', 'usertype', 'userid'], 'required'],
            [['resprojctfeedbackId', 'userid'], 'integer'],
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
            'resprojctfeedbackId' => 'Resprojctfeedback ID',
            'description' => 'Description',
            'usertype' => 'Usertype',
            'userid' => 'Userid',
            'datetime' => 'Datetime',
        ];
    }
}
