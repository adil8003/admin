<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comprojectcost".
 *
 * @property integer $id
 * @property string $persquarefeet
 * @property string $othercharges
 * @property string $totalcharges
 *
 * @property Comproject[] $comprojects
 */
class Comprojectcost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comprojectcost';
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
    public function getComprojects()
    {
        return $this->hasMany(Comproject::className(), ['comprojectcostid' => 'id']);
    }
}
