<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respropertyfeedback".
 *
 * @property integer $id
 * @property integer $respropertyid
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $description
 * @property string $status
 * @property string $datetime
 */
class Respropertyfeedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'respropertyfeedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['respropertyid', 'name', 'phone', 'email', 'description', 'status'], 'required'],
            [['respropertyid'], 'integer'],
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
            'respropertyid' => 'Respropertyid',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'description' => 'Description',
            'status' => 'Status',
            'datetime' => 'Datetime',
        ];
    }
}
