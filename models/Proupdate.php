<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proupdate".
 *
 * @property integer $id
 * @property integer $residentialid
 * @property integer $resaleid
 * @property integer $rentid
 * @property integer $commercialid
 * @property string $yearofconstruct
 * @property string $wing
 * @property string $status
 * @property string $addeddate
 * @property string $possesiondate
 * @property string $carpetarea
 * @property string $salablearea
 * @property string $reraid
 */
class Proupdate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proupdate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['residentialid', 'resaleid', 'rentid', 'commercialid'], 'integer'],
            [['yearofconstruct', 'addeddate', 'possesiondate'], 'safe'],
            [['wing', 'status', 'reraid'], 'required'],
            [['status'], 'string'],
            [['wing'], 'string', 'max' => 500],
            [['carpetarea', 'salablearea', 'reraid'], 'string', 'max' => 200]
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
            'commercialid' => 'Commercialid',
            'yearofconstruct' => 'Yearofconstruct',
            'wing' => 'Wing',
            'status' => 'Status',
            'addeddate' => 'Addeddate',
            'possesiondate' => 'Possesiondate',
            'carpetarea' => 'Carpetarea',
            'salablearea' => 'Salablearea',
            'reraid' => 'Reraid',
        ];
    }
}
