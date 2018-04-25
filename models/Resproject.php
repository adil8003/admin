<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resproject".
 *
 * @property integer $id
 * @property string $name
 * @property string $sublocation
 * @property string $location
 * @property string $city
 * @property string $state
 * @property string $pincode
 * @property string $status
 * @property integer $added_by
 * @property string $expectedprice
 * @property string $latlong
 * @property string $added_date
 * @property integer $resprojectamanetiesid
 * @property integer $resprojectcostid
 * @property integer $resprojectgeolocationid
 * @property integer $builderid
 * @property integer $resprojectprojectid
 * @property integer $resprojectpropertyid
 * @property integer $resprojectmicrositedetailsid
 * @property integer $resmoredataid
 * @property string $videolink
 *
 * @property Resprojectamaneties $resprojectamaneties
 * @property Resprojectmicrositedetails $resprojectmicrositedetails
 * @property Resmoredata $resmoredata
 * @property Builder $builder
 * @property Resprojectcost $resprojectcost
 * @property Resprojectgeolocation $resprojectgeolocation
 * @property Resprojectproject $resprojectproject
 * @property Resprojectproperty $resprojectproperty
 */
class Resproject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resproject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'location', 'city', 'added_by'], 'required'],
            [['added_by', 'resprojectamanetiesid', 'resprojectcostid', 'resprojectgeolocationid', 'builderid', 'resprojectprojectid', 'resprojectpropertyid', 'resprojectmicrositedetailsid', 'resmoredataid'], 'integer'],
            [['added_date'], 'safe'],
            [['videolink'], 'string'],
            [['name', 'location', 'city', 'state', 'latlong'], 'string', 'max' => 700],
            [['sublocation'], 'string', 'max' => 500],
            [['pincode', 'status'], 'string', 'max' => 100],
            [['expectedprice'], 'string', 'max' => 200]
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
            'sublocation' => 'Sublocation',
            'location' => 'Location',
            'city' => 'City',
            'state' => 'State',
            'pincode' => 'Pincode',
            'status' => 'Status',
            'added_by' => 'Added By',
            'expectedprice' => 'Expectedprice',
            'latlong' => 'Latlong',
            'added_date' => 'Added Date',
            'resprojectamanetiesid' => 'Resprojectamanetiesid',
            'resprojectcostid' => 'Resprojectcostid',
            'resprojectgeolocationid' => 'Resprojectgeolocationid',
            'builderid' => 'Builderid',
            'resprojectprojectid' => 'Resprojectprojectid',
            'resprojectpropertyid' => 'Resprojectpropertyid',
            'resprojectmicrositedetailsid' => 'Resprojectmicrositedetailsid',
            'resmoredataid' => 'Resmoredataid',
            'videolink' => 'Videolink',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResprojectamaneties()
    {
        return $this->hasOne(Resprojectamaneties::className(), ['id' => 'resprojectamanetiesid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResprojectmicrositedetails()
    {
        return $this->hasOne(Resprojectmicrositedetails::className(), ['id' => 'resprojectmicrositedetailsid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResmoredata()
    {
        return $this->hasOne(Resmoredata::className(), ['id' => 'resmoredataid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuilder()
    {
        return $this->hasOne(Builder::className(), ['id' => 'builderid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResprojectcost()
    {
        return $this->hasOne(Resprojectcost::className(), ['id' => 'resprojectcostid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResprojectgeolocation()
    {
        return $this->hasOne(Resprojectgeolocation::className(), ['id' => 'resprojectgeolocationid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResprojectproject()
    {
        return $this->hasOne(Resprojectproject::className(), ['id' => 'resprojectprojectid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResprojectproperty()
    {
        return $this->hasOne(Resprojectproperty::className(), ['id' => 'resprojectpropertyid']);
    }
}
