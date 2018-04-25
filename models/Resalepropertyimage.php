<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resalepropertyimage".
 *
 * @property integer $id
 * @property integer $resalepropertyid
 * @property string $type
 * @property string $path
 * @property integer $status
 * @property string $addeddate
 */
class Resalepropertyimage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resalepropertyimage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resalepropertyid', 'status'], 'integer'],
            [['type'], 'required'],
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
            'resalepropertyid' => 'Resalepropertyid',
            'type' => 'Type',
            'path' => 'Path',
            'status' => 'Status',
            'addeddate' => 'Addeddate',
        ];
    }
}
