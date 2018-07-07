<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $image
 * @property integer $status_id
 * @property integer $role_id
 * @property string $reg_date
 * @property integer $isverify
 * @property integer $mobverify
 *
 * @property Status $status
 * @property Roles $role
 * @property Userroles[] $userroles
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
            [['status_id', 'role_id', 'isverify', 'mobverify'], 'integer'],
            [['reg_date'], 'safe'],
            [['fullname'], 'string', 'max' => 500],
            [['username', 'email', 'password', 'image'], 'string', 'max' => 700],
            [['phone'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone',
            'image' => 'Image',
            'status_id' => 'Status ID',
            'role_id' => 'Role ID',
            'reg_date' => 'Reg Date',
            'isverify' => 'Isverify',
            'mobverify' => 'Mobverify',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserroles()
    {
        return $this->hasMany(Userroles::className(), ['user_id' => 'id']);
    }
}
