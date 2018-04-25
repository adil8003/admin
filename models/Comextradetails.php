<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comextradetails".
 *
 * @property integer $id
 * @property string $yearofconstruct
 * @property string $possessionstatus
 * @property integer $preferredid
 * @property integer $furnishingid
 * @property string $saleablearea
 * @property string $carpetarea
 * @property string $reserveparkingspace
 * @property string $preleasedvacant
 * @property string $preleasedrentstartedfrom
 * @property string $preleasedperiod
 * @property string $preleaseddepstannualescalation
 * @property string $currentstatus
 *
 * @property Comprojectpreferred $preferred
 * @property Comprojectfurnishing $furnishing
 * @property Comproject[] $comprojects
 */
class Comextradetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comextradetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['yearofconstruct', 'possessionstatus', 'saleablearea', 'carpetarea', 'reserveparkingspace', 'preleasedvacant', 'preleasedperiod', 'preleaseddepstannualescalation', 'currentstatus'], 'string'],
            [['preferredid', 'furnishingid'], 'integer'],
            [['preleasedrentstartedfrom'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'yearofconstruct' => 'Yearofconstruct',
            'possessionstatus' => 'Possessionstatus',
            'preferredid' => 'Preferredid',
            'furnishingid' => 'Furnishingid',
            'saleablearea' => 'Saleablearea',
            'carpetarea' => 'Carpetarea',
            'reserveparkingspace' => 'Reserveparkingspace',
            'preleasedvacant' => 'Preleasedvacant',
            'preleasedrentstartedfrom' => 'Preleasedrentstartedfrom',
            'preleasedperiod' => 'Preleasedperiod',
            'preleaseddepstannualescalation' => 'Preleaseddepstannualescalation',
            'currentstatus' => 'Currentstatus',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreferred()
    {
        return $this->hasOne(Comprojectpreferred::className(), ['id' => 'preferredid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFurnishing()
    {
        return $this->hasOne(Comprojectfurnishing::className(), ['id' => 'furnishingid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojects()
    {
        return $this->hasMany(Comproject::className(), ['comextradetailsid' => 'id']);
    }
}
