<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rupdate".
 *
 * @property integer $id
 * @property integer $residentialid
 * @property integer $resaleid
 * @property integer $rentid
 * @property integer $commercialid
 * @property string $wing
 * @property string $status
 * @property string $addeddate
 * @property string $possesiondate
 */
class Rupdate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rupdate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['residentialid', 'resaleid', 'rentid', 'commercialid'], 'integer'],
            [['wing', 'status', 'possesiondate'], 'required'],
            [['status'], 'string'],
            [['addeddate', 'possesiondate'], 'safe'],
            [['wing'], 'string', 'max' => 500]
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
            'wing' => 'Wing',
            'status' => 'Status',
            'addeddate' => 'Addeddate',
            'possesiondate' => 'Possesiondate',
        ];
    }
}
