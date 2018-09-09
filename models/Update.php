<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "update".
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
 */
class Update extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'update';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['residentialid', 'resaleid', 'rentid', 'commercialid'], 'integer'],
            [['yearofconstruct', 'wing', 'status', 'possesiondate'], 'required'],
            [['yearofconstruct', 'addeddate', 'possesiondate'], 'safe'],
            [['status'], 'string'],
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
            'yearofconstruct' => 'Yearofconstruct',
            'wing' => 'Wing',
            'status' => 'Status',
            'addeddate' => 'Addeddate',
            'possesiondate' => 'Possesiondate',
        ];
    }
}
