<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resalefeedback".
 *
 * @property integer $id
 * @property integer $resalepropertyid
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $description
 * @property string $status
 * @property string $datetime
 */
class Resalefeedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resalefeedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resalepropertyid', 'name', 'phone', 'email', 'description', 'status'], 'required'],
            [['resalepropertyid'], 'integer'],
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
            'resalepropertyid' => 'Resalepropertyid',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'description' => 'Description',
            'status' => 'Status',
            'datetime' => 'Datetime',
        ];
    }
}
