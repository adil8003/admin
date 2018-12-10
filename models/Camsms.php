<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "camsms".
 *
 * @property integer $id
 * @property string $Mobile
 * @property string $Email
 * @property double $Salary
 */
class Camsms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'camsms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Mobile', 'Email', 'Salary'], 'required'],
            [['Salary'], 'number'],
            [['Mobile'], 'string', 'max' => 700],
            [['Email'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Mobile' => 'Mobile',
            'Email' => 'Email',
            'Salary' => 'Salary',
        ];
    }
}
