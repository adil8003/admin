<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "followup".
 *
 * @property integer $id
 * @property integer $crm_id
 * @property string $remark
 * @property string $followupdate
 * @property string $addeddate
 */
class Followup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'followup';
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
