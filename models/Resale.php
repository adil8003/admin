<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resale".
 *
 * @property integer $id
 * @property string $ownername
 * @property string $contact
 * @property string $societyname
 * @property string $buildingname
 * @property string $wing
 * @property string $flatnumber
 * @property string $floornumber
 * @property string $location
 * @property string $landmark
 * @property string $address
 * @property double $price
 * @property string $carpetarea
 * @property integer $propertytypeid
 * @property string $age
 * @property string $propertyfacing
 * @property string $furniture
 * @property string $remarks
 * @property integer $statusid
 * @property string $added_date
 *
 * @property Status $status
 */
class Resale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'carpetarea', 'propertytypeid', 'statusid'], 'required'],
            [['price'], 'number'],
            [['propertytypeid', 'statusid'], 'integer'],
            [['remarks'], 'string'],
            [['added_date'], 'safe'],
            [['ownername', 'contact', 'societyname', 'buildingname', 'wing', 'flatnumber', 'floornumber', 'location', 'landmark', 'propertyfacing', 'furniture'], 'string', 'max' => 700],
            [['address'], 'string', 'max' => 900],
            [['carpetarea'], 'string', 'max' => 200],
            [['age'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ownername' => 'Ownername',
            'contact' => 'Contact',
            'societyname' => 'Societyname',
            'buildingname' => 'Buildingname',
            'wing' => 'Wing',
            'flatnumber' => 'Flatnumber',
            'floornumber' => 'Floornumber',
            'location' => 'Location',
            'landmark' => 'Landmark',
            'address' => 'Address',
            'price' => 'Price',
            'carpetarea' => 'Carpetarea',
            'propertytypeid' => 'Propertytypeid',
            'age' => 'Age',
            'propertyfacing' => 'Propertyfacing',
            'furniture' => 'Furniture',
            'remarks' => 'Remarks',
            'statusid' => 'Statusid',
            'added_date' => 'Added Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'statusid']);
    }
}
