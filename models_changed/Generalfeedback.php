<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "generalfeedback".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $description
 * @property string $status
 * @property string $added_date
 */
class Generalfeedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'generalfeedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'description', 'status'], 'required'],
            [['description'], 'string'],
            [['added_date'], 'safe'],
            [['name', 'email', 'phone'], 'string', 'max' => 700],
            [['status'], 'string', 'max' => 100]
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
            'email' => 'Email',
            'phone' => 'Phone',
            'description' => 'Description',
            'status' => 'Status',
            'added_date' => 'Added Date',
        ];
    }
}
