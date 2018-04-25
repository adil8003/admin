<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comprojectdetails".
 *
 * @property integer $id
 * @property string $shoporoffice
 * @property string $neworold
 * @property string $rentorpurchase
 * @property string $areapersqfeet
 * @property string $location
 * @property string $height
 * @property string $floornumber
 * @property string $rentorprice
 * @property string $parkingforshop
 * @property string $propertyfacing
 * @property string $pantry
 * @property string $cabin
 * @property string $workstation
 * @property string $cubicles
 * @property string $conferenceroom
 * @property string $twowheelerparking
 * @property string $fourwheelerparking
 * @property string $videolink
 *
 * @property Comproject[] $comprojects
 */
class Comprojectdetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comprojectdetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['videolink'], 'string'],
            [['shoporoffice', 'neworold', 'rentorpurchase', 'height', 'floornumber', 'propertyfacing', 'pantry'], 'string', 'max' => 200],
            [['areapersqfeet', 'location', 'rentorprice', 'parkingforshop', 'cabin', 'workstation', 'cubicles', 'conferenceroom', 'twowheelerparking', 'fourwheelerparking'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shoporoffice' => 'Shoporoffice',
            'neworold' => 'Neworold',
            'rentorpurchase' => 'Rentorpurchase',
            'areapersqfeet' => 'Areapersqfeet',
            'location' => 'Location',
            'height' => 'Height',
            'floornumber' => 'Floornumber',
            'rentorprice' => 'Rentorprice',
            'parkingforshop' => 'Parkingforshop',
            'propertyfacing' => 'Propertyfacing',
            'pantry' => 'Pantry',
            'cabin' => 'Cabin',
            'workstation' => 'Workstation',
            'cubicles' => 'Cubicles',
            'conferenceroom' => 'Conferenceroom',
            'twowheelerparking' => 'Twowheelerparking',
            'fourwheelerparking' => 'Fourwheelerparking',
            'videolink' => 'Videolink',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojects()
    {
        return $this->hasMany(Comproject::className(), ['comprojectdetailsid' => 'id']);
    }
}
