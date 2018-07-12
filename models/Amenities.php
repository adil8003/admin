<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "amenities".
 *
 * @property integer $id
 * @property integer $residentialid
 * @property integer $rentid
 * @property integer $resaleid
 * @property string $aname
 * @property integer $type
 * @property string $addeddate
 * @property integer $statusid
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
            [['residentialid', 'rentid', 'resaleid', 'type', 'statusid'], 'integer'],
            [['aname', 'type', 'statusid'], 'required'],
            [['addeddate'], 'safe'],
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
            'rentid' => 'Rentid',
            'resaleid' => 'Resaleid',
            'aname' => 'Aname',
            'type' => 'Type',
            'addeddate' => 'Addeddate',
            'statusid' => 'Statusid',
        ];
    }
}
