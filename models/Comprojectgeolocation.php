<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comprojectgeolocation".
 *
 * @property integer $id
 * @property string $railwaystation
 * @property string $airport
 * @property string $hospital
 * @property string $multiplex
 * @property string $school
 * @property string $college
 * @property string $market
 * @property string $temple
 * @property string $famousplace
 *
 * @property Comproject[] $comprojects
 */
class Comprojectgeolocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comprojectgeolocation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['railwaystation', 'airport', 'hospital', 'multiplex', 'school', 'college', 'market', 'temple', 'famousplace'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'railwaystation' => 'Railwaystation',
            'airport' => 'Airport',
            'hospital' => 'Hospital',
            'multiplex' => 'Multiplex',
            'school' => 'School',
            'college' => 'College',
            'market' => 'Market',
            'temple' => 'Temple',
            'famousplace' => 'Famousplace',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojects()
    {
        return $this->hasMany(Comproject::className(), ['comprojectgeolocationid' => 'id']);
    }
}
