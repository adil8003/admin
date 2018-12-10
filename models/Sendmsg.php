<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sendmsg".
 *
 * @property integer $id
 * @property string $mobile
 * @property integer $statusid
 * @property string $addeddate
 */
class Sendmsg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sendmsg';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mobile', 'statusid'], 'required'],
            [['mobile', 'statusid'], 'integer'],
            [['addeddate'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mobile' => 'Mobile',
            'statusid' => 'Statusid',
            'addeddate' => 'Addeddate',
        ];
    }
}
