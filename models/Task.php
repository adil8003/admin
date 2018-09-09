<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $ask
 * @property string $priority
 * @property string $addeddate
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ask'], 'required'],
            [['ask'], 'string'],
            [['addeddate'], 'safe'],
            [['priority'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ask' => 'Ask',
            'priority' => 'Priority',
            'addeddate' => 'Addeddate',
        ];
    }
}
