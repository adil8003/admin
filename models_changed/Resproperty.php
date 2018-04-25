<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resproperty".
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
 * @property integer $respropertyamanetiesid
 * @property integer $respropertyprojectid
 * @property integer $respropertycostid
 * @property integer $builderid
 * @property integer $respropertygeolocationid
 * @property integer $respropertytypeid
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
            'respropertyamanetiesid' => 'Respropertyamanetiesid',
            'respropertyprojectid' => 'Respropertyprojectid',
            'respropertycostid' => 'Respropertycostid',
            'builderid' => 'Builderid',
            'respropertygeolocationid' => 'Respropertygeolocationid',
            'respropertytypeid' => 'Respropertytypeid',
        ];
    }
}
