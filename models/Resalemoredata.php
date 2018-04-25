<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resalemoredata".
 *
 * @property integer $id
 * @property integer $schoolid
 * @property string $schooltrext
 * @property integer $collageid
 * @property string $collagetext
 * @property integer $multiplexid
 * @property string $multiplextext
 * @property integer $policestationid
 * @property string $policestationtext
 * @property integer $railwaystationid
 * @property string $railwaystationtext
 * @property integer $airportid
 * @property string $airporttext
 * @property integer $mallid
 * @property string $malltext
 * @property integer $marketid
 * @property string $markettext
 * @property integer $templeid
 * @property string $templetext
 * @property integer $liftid
 * @property integer $childrenplaygroundid
 * @property integer $seniorcitizenid
 * @property integer $gymid
 * @property integer $parkingid
 * @property integer $securityid
 * @property integer $swimmingpoolid
 * @property integer $clubhouseid
 *
 * @property Resaleproperty[] $resaleproperties
 */
class Resalemoredata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resalemoredata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['schoolid', 'collageid', 'multiplexid', 'policestationid', 'railwaystationid', 'airportid', 'mallid', 'marketid', 'templeid', 'liftid', 'childrenplaygroundid', 'seniorcitizenid', 'gymid', 'parkingid', 'securityid', 'swimmingpoolid', 'clubhouseid'], 'integer'],
            [['schooltrext', 'collagetext', 'multiplextext', 'policestationtext', 'railwaystationtext', 'airporttext', 'malltext', 'markettext', 'templetext'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'schoolid' => 'Schoolid',
            'schooltrext' => 'Schooltrext',
            'collageid' => 'Collageid',
            'collagetext' => 'Collagetext',
            'multiplexid' => 'Multiplexid',
            'multiplextext' => 'Multiplextext',
            'policestationid' => 'Policestationid',
            'policestationtext' => 'Policestationtext',
            'railwaystationid' => 'Railwaystationid',
            'railwaystationtext' => 'Railwaystationtext',
            'airportid' => 'Airportid',
            'airporttext' => 'Airporttext',
            'mallid' => 'Mallid',
            'malltext' => 'Malltext',
            'marketid' => 'Marketid',
            'markettext' => 'Markettext',
            'templeid' => 'Templeid',
            'templetext' => 'Templetext',
            'liftid' => 'Liftid',
            'childrenplaygroundid' => 'Childrenplaygroundid',
            'seniorcitizenid' => 'Seniorcitizenid',
            'gymid' => 'Gymid',
            'parkingid' => 'Parkingid',
            'securityid' => 'Securityid',
            'swimmingpoolid' => 'Swimmingpoolid',
            'clubhouseid' => 'Clubhouseid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResaleproperties()
    {
        return $this->hasMany(Resaleproperty::className(), ['resalemoredataid' => 'id']);
    }
}
