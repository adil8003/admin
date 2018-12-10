<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resale".
 *
 * @property integer $id
 * @property string $ownername
 * @property string $contact
 * @property string $image
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
 * @property integer $protype
 * @property integer $userid
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
            [['image', 'price', 'carpetarea', 'propertytypeid', 'statusid', 'protype', 'userid'], 'required'],
            [['price'], 'number'],
            [['propertytypeid', 'statusid', 'protype', 'userid'], 'integer'],
            [['remarks'], 'string'],
            [['added_date'], 'safe'],
            [['ownername', 'contact', 'image', 'societyname', 'buildingname', 'wing', 'flatnumber', 'floornumber', 'location', 'landmark', 'propertyfacing', 'furniture'], 'string', 'max' => 700],
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
            'image' => 'Image',
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
            'protype' => 'Protype',
            'userid' => 'Userid',
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
