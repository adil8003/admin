<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respropertyimage".
 *
 * @property integer $id
 * @property integer $respropertyid
 * @property string $type
 * @property string $path
 * @property integer $status
 * @property string $addeddate
 */
class Respropertyimage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'respropertyimage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['respropertyid', 'type', 'path'], 'required'],
            [['respropertyid', 'status'], 'integer'],
            [['addeddate'], 'safe'],
            [['type'], 'string', 'max' => 100],
            [['path'], 'string', 'max' => 700]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'respropertyid' => 'Respropertyid',
            'type' => 'Type',
            'path' => 'Path',
            'status' => 'Status',
            'addeddate' => 'Addeddate',
        ];
    }
}
