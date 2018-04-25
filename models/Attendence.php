<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "attendence".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $attn_date
 * @property string $in_time
 * @property string $out_time
 * @property integer $leavetype_id
 *
 * @property Leavetype $leavetype
 * @property User $user
 */
class Attendence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'attendence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'attn_date', 'leavetype_id'], 'required'],
            [['user_id', 'leavetype_id'], 'integer'],
            [['attn_date', 'in_time', 'out_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'attn_date' => 'Attn Date',
            'in_time' => 'In Time',
            'out_time' => 'Out Time',
            'leavetype_id' => 'Leavetype ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLeavetype()
    {
        return $this->hasOne(Leavetype::className(), ['id' => 'leavetype_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
