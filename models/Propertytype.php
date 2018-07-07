<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propertytype".
 *
 * @property string $name
 * @property integer $id
 */
class Propertytype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'propertytype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'id' => 'ID',
        ];
    }
}
