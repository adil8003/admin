<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respropertyfurnishedstatus".
 *
 * @property integer $id
 * @property string $status
 */
class Respropertyfurnishedstatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'respropertyfurnishedstatus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'required'],
            [['status'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
        ];
    }
}
