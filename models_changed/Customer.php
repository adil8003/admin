<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $location
 * @property string $city
 * @property string $pincode
 * @property string $status
 * @property string $addedby
 * @property string $addeddate
 * @property string $description
 * @property string $picpath
 * @property string $contacted_by
 * @property string $message_date
 *
 * @property Followup[] $followups
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addeddate'], 'safe'],
            [['description'], 'string'],
            [['name', 'phone', 'email', 'location', 'city', 'pincode', 'picpath'], 'string', 'max' => 700],
            [['status', 'addedby'], 'string', 'max' => 100],
            [['contacted_by', 'message_date'], 'string', 'max' => 500]
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
            'phone' => 'Phone',
            'email' => 'Email',
            'location' => 'Location',
            'city' => 'City',
            'pincode' => 'Pincode',
            'status' => 'Status',
            'addedby' => 'Addedby',
            'addeddate' => 'Addeddate',
            'description' => 'Description',
            'picpath' => 'Picpath',
            'contacted_by' => 'Contacted By',
            'message_date' => 'Message Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFollowups()
    {
        return $this->hasMany(Followup::className(), ['customerid' => 'id']);
    }
}
