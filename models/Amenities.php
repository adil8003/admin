<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "amenities".
 *
 * @property integer $id
 * @property integer $residentialid
 * @property integer $commercialid
 * @property integer $rentid
 * @property integer $resaleid
 * @property string $aname
 * @property integer $type
 * @property string $cdetails
 * @property string $addeddate
 * @property integer $statusid
 * @property string $tagline
 */
class Amenities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'amenities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['residentialid', 'commercialid', 'rentid', 'resaleid', 'type', 'statusid'], 'integer'],
            [['cdetails', 'tagline'], 'string'],
            [['addeddate'], 'safe'],
            [['statusid'], 'required'],
            [['aname'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'residentialid' => 'Residentialid',
            'commercialid' => 'Commercialid',
            'rentid' => 'Rentid',
            'resaleid' => 'Resaleid',
            'aname' => 'Aname',
            'type' => 'Type',
            'cdetails' => 'Cdetails',
            'addeddate' => 'Addeddate',
            'statusid' => 'Statusid',
            'tagline' => 'Tagline',
        ];
    }
}
