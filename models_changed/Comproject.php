<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comproject".
 *
 * @property integer $id
 * @property string $name
 * @property string $location
 * @property string $city
 * @property string $state
 * @property string $pincode
 * @property string $status
 * @property integer $added_by
 * @property string $latlong
 * @property string $added_date
 * @property integer $comprojectgeolocationid
 * @property integer $comprojectamanetiesid
 * @property integer $builderid
 * @property integer $comprojectprojectid
 * @property integer $comprojectofficeid
 * @property integer $comprojectmicrositedetailsid
 * @property integer $comprojectdetailsid
 * @property string $videolink
 *
 * @property Builder $builder
 * @property Comprojectamaneties $comprojectamaneties
 * @property Comprojectgeolocation $comprojectgeolocation
 * @property Comprojectproject $comprojectproject
 * @property Comprojectoffice $comprojectoffice
 * @property Comprojectdetails $comprojectdetails
 * @property Comprojectmicrositedetails $comprojectmicrositedetails
 * @property Comprojectowner[] $comprojectowners
 */
class Comproject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comproject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'location', 'city', 'added_by'], 'required'],
            [['added_by', 'comprojectgeolocationid', 'comprojectamanetiesid', 'builderid', 'comprojectprojectid', 'comprojectofficeid', 'comprojectmicrositedetailsid', 'comprojectdetailsid'], 'integer'],
            [['added_date'], 'safe'],
            [['videolink'], 'string'],
            [['name', 'location', 'city', 'state', 'latlong'], 'string', 'max' => 700],
            [['pincode', 'status'], 'string', 'max' => 100]
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
            'location' => 'Location',
            'city' => 'City',
            'state' => 'State',
            'pincode' => 'Pincode',
            'status' => 'Status',
            'added_by' => 'Added By',
            'latlong' => 'Latlong',
            'added_date' => 'Added Date',
            'comprojectgeolocationid' => 'Comprojectgeolocationid',
            'comprojectamanetiesid' => 'Comprojectamanetiesid',
            'builderid' => 'Builderid',
            'comprojectprojectid' => 'Comprojectprojectid',
            'comprojectofficeid' => 'Comprojectofficeid',
            'comprojectmicrositedetailsid' => 'Comprojectmicrositedetailsid',
            'comprojectdetailsid' => 'Comprojectdetailsid',
            'videolink' => 'Videolink',
        ];
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
    public function getComprojectamaneties()
    {
        return $this->hasOne(Comprojectamaneties::className(), ['id' => 'comprojectamanetiesid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojectgeolocation()
    {
        return $this->hasOne(Comprojectgeolocation::className(), ['id' => 'comprojectgeolocationid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojectproject()
    {
        return $this->hasOne(Comprojectproject::className(), ['id' => 'comprojectprojectid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojectoffice()
    {
        return $this->hasOne(Comprojectoffice::className(), ['id' => 'comprojectofficeid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojectdetails()
    {
        return $this->hasOne(Comprojectdetails::className(), ['id' => 'comprojectdetailsid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojectmicrositedetails()
    {
        return $this->hasOne(Comprojectmicrositedetails::className(), ['id' => 'comprojectmicrositedetailsid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojectowners()
    {
        return $this->hasMany(Comprojectowner::className(), ['comprojectid' => 'id']);
    }
}
