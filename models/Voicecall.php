<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "voicecall".
 *
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property string $email
 * @property integer $statusid
 * @property double $salary
 * @property integer $builderid
 * @property integer $userid
 * @property string $addeddate
 */
class Voicecall extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'voicecall';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mobile', 'email', 'statusid', 'salary', 'builderid', 'userid'], 'required'],
            [['mobile', 'statusid', 'builderid', 'userid'], 'integer'],
            [['salary'], 'number'],
            [['addeddate'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['email'], 'string', 'max' => 500]
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
            'mobile' => 'Mobile',
            'email' => 'Email',
            'statusid' => 'Statusid',
            'salary' => 'Salary',
            'builderid' => 'Builderid',
            'userid' => 'Userid',
            'addeddate' => 'Addeddate',
        ];
    }
}
