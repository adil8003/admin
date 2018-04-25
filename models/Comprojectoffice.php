<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comprojectoffice".
 *
 * @property integer $id
 * @property string $yearofconstruct
 * @property string $yearofposition
 * @property string $age
 * @property integer $furnishingid
 * @property integer $preferredid
 * @property string $totalfloor
 * @property string $floorno
 * @property integer $commercialprojtypeid
 * @property string $officetotalsqfeet
 * @property string $costpersqfeet
 * @property string $othercharges
 *
 * @property Comproject[] $comprojects
 */
class Comprojectoffice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comprojectoffice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['yearofconstruct', 'yearofposition', 'age', 'totalfloor', 'floorno', 'officetotalsqfeet', 'costpersqfeet', 'othercharges'], 'string'],
            [['furnishingid', 'preferredid', 'commercialprojtypeid'], 'integer']
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
            'yearofposition' => 'Yearofposition',
            'age' => 'Age',
            'furnishingid' => 'Furnishingid',
            'preferredid' => 'Preferredid',
            'totalfloor' => 'Totalfloor',
            'floorno' => 'Floorno',
            'commercialprojtypeid' => 'Commercialprojtypeid',
            'officetotalsqfeet' => 'Officetotalsqfeet',
            'costpersqfeet' => 'Costpersqfeet',
            'othercharges' => 'Othercharges',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojects()
    {
        return $this->hasMany(Comproject::className(), ['comprojectofficeid' => 'id']);
    }
}
