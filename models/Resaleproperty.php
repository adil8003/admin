<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resaleproperty".
 *
 * @property integer $id
 * @property string $ownername
 * @property string $contact
 * @property string $projecttype
 * @property string $detailaddress
 * @property string $societyname
 * @property string $buildingname
 * @property string $wing
 * @property string $flatnumber
 * @property string $floornumber
 * @property string $sublocation
 * @property string $location
 * @property string $landmark
 * @property string $expectedprice
 * @property string $propertyarea
 * @property string $propertytype
 * @property string $age
 * @property string $reserveparking
 * @property string $lift
 * @property string $propertyfacing
 * @property string $furniture
 * @property string $otheramenities
 * @property string $remarks
 * @property string $propertysource
 * @property string $resellrent
 * @property string $date
 * @property string $status
 * @property string $added_date
 * @property integer $resalemicrositedetailsid
 * @property integer $resalemoredataid
 * @property string $videolink
 *
 * @property Resalemicrositedetails $resalemicrositedetails
 * @property Resalemoredata $resalemoredata
 */
class Resaleproperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resaleproperty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detailaddress', 'otheramenities', 'remarks', 'videolink'], 'string'],
            [['added_date'], 'safe'],
            [['resalemicrositedetailsid', 'resalemoredataid'], 'integer'],
            [['ownername', 'contact', 'societyname', 'buildingname', 'wing', 'flatnumber', 'floornumber', 'location', 'landmark', 'propertyarea', 'propertytype', 'reserveparking', 'lift', 'propertyfacing', 'furniture', 'propertysource', 'date'], 'string', 'max' => 700],
            [['projecttype'], 'string', 'max' => 200],
            [['sublocation', 'expectedprice'], 'string', 'max' => 500],
            [['age', 'resellrent', 'status'], 'string', 'max' => 100]
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
            'projecttype' => 'Projecttype',
            'detailaddress' => 'Detailaddress',
            'societyname' => 'Societyname',
            'buildingname' => 'Buildingname',
            'wing' => 'Wing',
            'flatnumber' => 'Flatnumber',
            'floornumber' => 'Floornumber',
            'sublocation' => 'Sublocation',
            'location' => 'Location',
            'landmark' => 'Landmark',
            'expectedprice' => 'Expectedprice',
            'propertyarea' => 'Propertyarea',
            'propertytype' => 'Propertytype',
            'age' => 'Age',
            'reserveparking' => 'Reserveparking',
            'lift' => 'Lift',
            'propertyfacing' => 'Propertyfacing',
            'furniture' => 'Furniture',
            'otheramenities' => 'Otheramenities',
            'remarks' => 'Remarks',
            'propertysource' => 'Propertysource',
            'resellrent' => 'Resellrent',
            'date' => 'Date',
            'status' => 'Status',
            'added_date' => 'Added Date',
            'resalemicrositedetailsid' => 'Resalemicrositedetailsid',
            'resalemoredataid' => 'Resalemoredataid',
            'videolink' => 'Videolink',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResalemicrositedetails()
    {
        return $this->hasOne(Resalemicrositedetails::className(), ['id' => 'resalemicrositedetailsid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResalemoredata()
    {
        return $this->hasOne(Resalemoredata::className(), ['id' => 'resalemoredataid']);
    }
}
