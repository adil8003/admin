<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resprojectcost".
 *
 * @property integer $id
 * @property string $persquarefeet
 * @property string $othercharges
 * @property string $totalcharges
 *
 * @property Resproject[] $resprojects
 */
class Resprojectcost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resprojectcost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persquarefeet', 'othercharges', 'totalcharges'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'persquarefeet' => 'Persquarefeet',
            'othercharges' => 'Othercharges',
            'totalcharges' => 'Totalcharges',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResprojects()
    {
        return $this->hasMany(Resproject::className(), ['resprojectcostid' => 'id']);
    }
}
