<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "callfollowup".
 *
 * @property integer $id
 * @property integer $crm_id
 * @property string $remark
 * @property string $followupdate
 * @property string $addeddate
 */
class Callfollowup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'callfollowup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crm_id', 'remark', 'followupdate'], 'required'],
            [['crm_id'], 'integer'],
            [['remark'], 'string'],
            [['followupdate', 'addeddate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'crm_id' => 'Crm ID',
            'remark' => 'Remark',
            'followupdate' => 'Followupdate',
            'addeddate' => 'Addeddate',
        ];
    }
}
