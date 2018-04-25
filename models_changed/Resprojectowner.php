<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resprojectowner".
 *
 * @property integer $id
 * @property integer $builderid
 */
class Resprojectowner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resprojectowner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['builderid'], 'required'],
            [['builderid'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'builderid' => 'Builderid',
        ];
    }
}
