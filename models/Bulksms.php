<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bulksms".
 *
 * @property integer $id
 * @property integer $camid
 * @property string $mobile
 * @property string $addeded
 * @property integer $statusid
 */
class Bulksms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bulksms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['camid', 'mobile', 'statusid'], 'required'],
            [['camid', 'mobile', 'statusid'], 'integer'],
            [['addeded'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'camid' => 'Camid',
            'mobile' => 'Mobile',
            'addeded' => 'Addeded',
            'statusid' => 'Statusid',
        ];
    }
}
