<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contactus".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $subject
 * @property string $message
 * @property string $date
 */
class Contactus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contactus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'subject', 'message'], 'required'],
            [['message'], 'string'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 300],
            [['email'], 'string', 'max' => 500],
            [['phone'], 'string', 'max' => 700],
            [['subject'], 'string', 'max' => 1000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'subject' => 'Subject',
            'message' => 'Message',
            'date' => 'Date',
        ];
    }
}
