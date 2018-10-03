<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "postproperty".
 *
 * @property integer $id
 * @property integer $builderid
 * @property integer $ownerid
 * @property integer $agentid
 * @property integer $rentid
 * @property integer $saleid
 * @property string $contact
 * @property string $email
 * @property string $location
 * @property string $totalarea
 * @property string $expectedprice
 * @property string $addeddate
 */
class Postproperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'postproperty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['builderid', 'ownerid', 'agentid', 'rentid', 'saleid', 'expectedprice'], 'integer'],
            [['addeddate'], 'safe'],
            [['contact', 'email', 'location'], 'string', 'max' => 700],
            [['totalarea'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'builderid' => 'Builderid',
            'ownerid' => 'Ownerid',
            'agentid' => 'Agentid',
            'rentid' => 'Rentid',
            'saleid' => 'Saleid',
            'contact' => 'Contact',
            'email' => 'Email',
            'location' => 'Location',
            'totalarea' => 'Totalarea',
            'expectedprice' => 'Expectedprice',
            'addeddate' => 'Addeddate',
        ];
    }
}
