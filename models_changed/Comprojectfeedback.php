<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comprojectfeedback".
 *
 * @property integer $id
 * @property integer $comprojectid
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $description
 * @property string $status
 * @property string $datetime
 */
class Comprojectfeedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comprojectfeedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comprojectid', 'name', 'phone', 'email', 'description', 'status'], 'required'],
            [['comprojectid'], 'integer'],
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
            'comprojectid' => 'Comprojectid',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'description' => 'Description',
            'status' => 'Status',
            'datetime' => 'Datetime',
        ];
    }
}
