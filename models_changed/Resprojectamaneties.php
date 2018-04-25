<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resprojectamaneties".
 *
 * @property integer $id
 * @property string $swimingpool
 * @property string $garden
 * @property string $gym
 * @property string $temple
 * @property string $clubhouse
 * @property string $solarsystem
 * @property string $securitydoor
 *
 * @property Resproject[] $resprojects
 */
class Resprojectamaneties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resprojectamaneties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['swimingpool', 'garden', 'gym', 'temple', 'clubhouse', 'solarsystem', 'securitydoor'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'swimingpool' => 'Swimingpool',
            'garden' => 'Garden',
            'gym' => 'Gym',
            'temple' => 'Temple',
            'clubhouse' => 'Clubhouse',
            'solarsystem' => 'Solarsystem',
            'securitydoor' => 'Securitydoor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResprojects()
    {
        return $this->hasMany(Resproject::className(), ['resprojectamanetiesid' => 'id']);
    }
}
