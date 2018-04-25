<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userpersonal".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $phone
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $country
 *
 * @property User $user
 */
class Userpersonal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userpersonal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['phone', 'state', 'country'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 700],
            [['city'], 'string', 'max' => 300]
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
            'phone' => 'Phone',
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'country' => 'Country',
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
