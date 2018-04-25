<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usereducational".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $tenth
 * @property string $twelth
 * @property string $graduate
 * @property string $postgraduate
 *
 * @property User $user
 */
class Usereducational extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usereducational';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['tenth', 'twelth', 'graduate', 'postgraduate'], 'string']
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
            'tenth' => 'Tenth',
            'twelth' => 'Twelth',
            'graduate' => 'Graduate',
            'postgraduate' => 'Postgraduate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
