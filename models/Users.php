<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $addeddate
 * @property string $name
 * @property string $mobile
 * @property string $email
 * @property string $address
 * @property string $password
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addeddate'], 'safe'],
            [['name', 'mobile', 'email', 'address', 'password'], 'required'],
            [['mobile'], 'integer'],
            [['name', 'email', 'address'], 'string', 'max' => 500],
            [['password'], 'string', 'max' => 700]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'addeddate' => 'Addeddate',
            'name' => 'Name',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'address' => 'Address',
            'password' => 'Password',
        ];
    }
}
