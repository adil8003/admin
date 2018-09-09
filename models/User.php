<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $image
 * @property integer $status_id
 * @property integer $role_id
 * @property string $reg_date
 *
 * @property Status $status
 * @property Roles $role
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password', 'phone', 'image', 'status_id', 'role_id'], 'required'],
            [['status_id', 'role_id'], 'integer'],
            [['reg_date'], 'safe'],
            [['username'], 'string', 'max' => 500],
            [['email', 'password', 'phone', 'image'], 'string', 'max' => 700]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone',
            'image' => 'Image',
            'status_id' => 'Status ID',
            'role_id' => 'Role ID',
            'reg_date' => 'Reg Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Roles::className(), ['id' => 'role_id']);
    }
}
