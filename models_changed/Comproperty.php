<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comproperty".
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
 * @property integer $comprojectid
 * @property integer $builderid
 * @property integer $comofficeid
 * @property integer $comamaneties
 * @property integer $comgeolocation
 */
class Comproperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comproperty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'location', 'city', 'added_by'], 'required'],
            [['added_by', 'comprojectid', 'builderid', 'comofficeid', 'comamaneties', 'comgeolocation'], 'integer'],
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
            'comprojectid' => 'Comprojectid',
            'builderid' => 'Builderid',
            'comofficeid' => 'Comofficeid',
            'comamaneties' => 'Comamaneties',
            'comgeolocation' => 'Comgeolocation',
        ];
    }
}
