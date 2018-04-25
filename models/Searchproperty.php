<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "searchproperty".
 *
 * @property integer $id
 * @property string $propertyid
 * @property string $name
 * @property string $location
 * @property string $city
 * @property string $path
 * @property integer $persquarefeet
 * @property string $propertyarea
 * @property string $ownername
 * @property string $landmark
 * @property string $lift
 * @property string $ameneties
 * @property integer $expectedprice
 * @property integer $resellrent
 * @property integer $shoporoffice
 * @property string $neworold
 * @property string $typeofproperty
 * @property string $zone
 * @property string $selectproperty
 * @property string $selecttype
 * @property string $status
 */
class Searchproperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'searchproperty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['propertyid'], 'required'],
            [['path'], 'string'],
            [['persquarefeet', 'expectedprice', 'resellrent', 'shoporoffice'], 'integer'],
            [['propertyid'], 'string', 'max' => 10],
            [['name', 'location', 'city', 'ownername', 'landmark', 'typeofproperty', 'zone'], 'string', 'max' => 700],
            [['propertyarea'], 'string', 'max' => 500],
            [['lift', 'ameneties', 'selectproperty', 'selecttype', 'status'], 'string', 'max' => 100],
            [['neworold'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'propertyid' => 'Propertyid',
            'name' => 'Name',
            'location' => 'Location',
            'city' => 'City',
            'path' => 'Path',
            'persquarefeet' => 'Persquarefeet',
            'propertyarea' => 'Propertyarea',
            'ownername' => 'Ownername',
            'landmark' => 'Landmark',
            'lift' => 'Lift',
            'ameneties' => 'Ameneties',
            'expectedprice' => 'Expectedprice',
            'resellrent' => 'Resellrent',
            'shoporoffice' => 'Shoporoffice',
            'neworold' => 'Neworold',
            'typeofproperty' => 'Typeofproperty',
            'zone' => 'Zone',
            'selectproperty' => 'Selectproperty',
            'selecttype' => 'Selecttype',
            'status' => 'Status',
        ];
    }
}
