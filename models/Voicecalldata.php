<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "voicecalldata".
 *
 * @property integer $id
 * @property string $name
 * @property string $mobile
 * @property string $email
 * @property double $salary
 */
class Voicecalldata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'voicecalldata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mobile', 'email', 'salary'], 'required'],
            [['mobile'], 'integer'],
            [['salary'], 'number'],
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
            'salary' => 'Salary',
        ];
    }
}
