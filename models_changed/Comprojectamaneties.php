<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comprojectamaneties".
 *
 * @property integer $id
 * @property string $lift
 * @property string $parking
 * @property string $restroom
 * @property string $furnishing
 * @property string $preferred
 *
 * @property Comproject[] $comprojects
 */
class Comprojectamaneties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comprojectamaneties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lift', 'parking', 'restroom', 'furnishing', 'preferred'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lift' => 'Lift',
            'parking' => 'Parking',
            'restroom' => 'Restroom',
            'furnishing' => 'Furnishing',
            'preferred' => 'Preferred',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojects()
    {
        return $this->hasMany(Comproject::className(), ['comprojectamanetiesid' => 'id']);
    }
}
