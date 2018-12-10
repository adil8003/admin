<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "campaign".
 *
 * @property integer $id
 * @property string $campaign
 * @property string $msg
 * @property integer $type
 * @property integer $status
 * @property string $addeddate
 */
class Campaign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campaign';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['campaign', 'msg', 'type', 'status'], 'required'],
            [['type', 'status'], 'integer'],
            [['addeddate'], 'safe'],
            [['campaign'], 'string', 'max' => 200],
            [['msg'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'campaign' => 'Campaign',
            'msg' => 'Msg',
            'type' => 'Type',
            'status' => 'Status',
            'addeddate' => 'Addeddate',
        ];
    }
}
