<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leavetype".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Attendence[] $attendences
 */
class Leavetype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leavetype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 700]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendences()
    {
        return $this->hasMany(Attendence::className(), ['leavetype_id' => 'id']);
    }
}
