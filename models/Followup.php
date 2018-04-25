<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "followup".
 *
 * @property integer $id
 * @property integer $customerid
 * @property integer $propertyid
 * @property string $projecttype
 * @property string $rentpurchase
 * @property string $newresale
 * @property string $restypeofproperty
 * @property string $comtypeofproperty
 * @property string $industypeofproperty
 * @property string $expectedprice
 * @property string $firstremark
 * @property string $followupdate
 * @property string $status
 * @property string $createddate
 * @property string $firstdiscussionby
 * @property string $attendedby
 * @property string $attendedremark
 *
 * @property Customer[] $customers
 * @property Customer $customer
 */
class Followup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'followup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerid', 'propertyid'], 'integer'],
            [['firstremark', 'attendedremark'], 'string'],
            [['createddate'], 'safe'],
            [['projecttype', 'rentpurchase', 'newresale'], 'string', 'max' => 200],
            [['restypeofproperty', 'comtypeofproperty', 'industypeofproperty', 'expectedprice', 'firstdiscussionby', 'attendedby'], 'string', 'max' => 700],
            [['followupdate'], 'string', 'max' => 500],
            [['status'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customerid' => 'Customerid',
            'propertyid' => 'Propertyid',
            'projecttype' => 'Projecttype',
            'rentpurchase' => 'Rentpurchase',
            'newresale' => 'Newresale',
            'restypeofproperty' => 'Restypeofproperty',
            'comtypeofproperty' => 'Comtypeofproperty',
            'industypeofproperty' => 'Industypeofproperty',
            'expectedprice' => 'Expectedprice',
            'firstremark' => 'Firstremark',
            'followupdate' => 'Followupdate',
            'status' => 'Status',
            'createddate' => 'Createddate',
            'firstdiscussionby' => 'Firstdiscussionby',
            'attendedby' => 'Attendedby',
            'attendedremark' => 'Attendedremark',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['followupid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customerid']);
    }
}
