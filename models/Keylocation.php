<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "keylocation".
 *
 * @property integer $id
 * @property integer $residentialid
 * @property integer $resaleid
 * @property integer $rentid
 * @property string $kname
 * @property integer $type
 * @property integer $statusid
 * @property string $addeddate
 * @property string $distance
 */
class Keylocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'keylocation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['residentialid', 'resaleid', 'rentid', 'type', 'statusid'], 'integer'],
            [['kname', 'type', 'statusid', 'distance'], 'required'],
            [['addeddate'], 'safe'],
            [['kname'], 'string', 'max' => 500],
            [['distance'], 'string', 'max' => 200]
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
            'resaleid' => 'Resaleid',
            'rentid' => 'Rentid',
            'kname' => 'Kname',
            'type' => 'Type',
            'statusid' => 'Statusid',
            'addeddate' => 'Addeddate',
            'distance' => 'Distance',
        ];
    }
}
