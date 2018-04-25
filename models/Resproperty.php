<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resproperty".
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
 * @property string $latlong
 * @property string $added_date
 * @property integer $respropertyamanetiesid
 * @property integer $respropertyprojectid
 * @property integer $respropertycostid
 * @property integer $builderid
 * @property integer $respropertygeolocationid
 * @property integer $respropertytypeid
 *
 * @property Respropertyamaneties $respropertyamaneties
 * @property Respropertyproject $respropertyproject
 * @property Builder $builder
 * @property Respropertygeolocation $respropertygeolocation
 * @property Respropertycost $respropertycost
 * @property Respropertytype $respropertytype
 */
class Resproperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resproperty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'location', 'city', 'added_by'], 'required'],
            [['added_by', 'respropertyamanetiesid', 'respropertyprojectid', 'respropertycostid', 'builderid', 'respropertygeolocationid', 'respropertytypeid'], 'integer'],
            [['added_date'], 'safe'],
            [['name', 'location', 'city', 'state', 'latlong'], 'string', 'max' => 700],
            [['sublocation'], 'string', 'max' => 500],
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
            'sublocation' => 'Sublocation',
            'location' => 'Location',
            'city' => 'City',
            'state' => 'State',
            'pincode' => 'Pincode',
            'status' => 'Status',
            'added_by' => 'Added By',
            'latlong' => 'Latlong',
            'added_date' => 'Added Date',
            'respropertyamanetiesid' => 'Respropertyamanetiesid',
            'respropertyprojectid' => 'Respropertyprojectid',
            'respropertycostid' => 'Respropertycostid',
            'builderid' => 'Builderid',
            'respropertygeolocationid' => 'Respropertygeolocationid',
            'respropertytypeid' => 'Respropertytypeid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespropertyamaneties()
    {
        return $this->hasOne(Respropertyamaneties::className(), ['id' => 'respropertyamanetiesid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespropertyproject()
    {
        return $this->hasOne(Respropertyproject::className(), ['id' => 'respropertyprojectid']);
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
    public function getRespropertygeolocation()
    {
        return $this->hasOne(Respropertygeolocation::className(), ['id' => 'respropertygeolocationid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespropertycost()
    {
        return $this->hasOne(Respropertycost::className(), ['id' => 'respropertycostid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespropertytype()
    {
        return $this->hasOne(Respropertytype::className(), ['id' => 'respropertytypeid']);
    }
}
