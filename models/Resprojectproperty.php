<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resprojectproperty".
 *
 * @property integer $id
 * @property string $rkflat
 * @property string $onebhk
 * @property string $twobhk
 * @property string $tp5bhk
 * @property string $threebhk
 * @property string $rowhose
 * @property string $typeofvilla
 *
 * @property Resproject[] $resprojects
 */
class Resprojectproperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resprojectproperty';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rkflat', 'onebhk', 'twobhk', 'tp5bhk', 'threebhk', 'rowhose', 'typeofvilla'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rkflat' => 'Rkflat',
            'onebhk' => 'Onebhk',
            'twobhk' => 'Twobhk',
            'tp5bhk' => 'Tp5bhk',
            'threebhk' => 'Threebhk',
            'rowhose' => 'Rowhose',
            'typeofvilla' => 'Typeofvilla',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResprojects()
    {
        return $this->hasMany(Resproject::className(), ['resprojectpropertyid' => 'id']);
    }
}
