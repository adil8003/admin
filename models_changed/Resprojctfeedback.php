<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resprojctfeedback".
 *
 * @property integer $id
 * @property integer $resprojectid
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $description
 * @property string $status
 * @property string $datetime
 */
class Resprojctfeedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resprojctfeedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resprojectid', 'name', 'phone', 'email', 'description', 'status'], 'required'],
            [['resprojectid'], 'integer'],
            [['description'], 'string'],
            [['datetime'], 'safe'],
            [['name', 'status'], 'string', 'max' => 100],
            [['phone', 'email'], 'string', 'max' => 700]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'resprojectid' => 'Resprojectid',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'description' => 'Description',
            'status' => 'Status',
            'datetime' => 'Datetime',
        ];
    }
}
