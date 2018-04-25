<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resprojectimage".
 *
 * @property integer $id
 * @property integer $resprojectid
 * @property string $type
 * @property string $path
 * @property integer $status
 * @property string $addeddate
 */
class Resprojectimage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resprojectimage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['resprojectid', 'type', 'path'], 'required'],
            [['resprojectid', 'status'], 'integer'],
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
            'resprojectid' => 'Resprojectid',
            'type' => 'Type',
            'path' => 'Path',
            'status' => 'Status',
            'addeddate' => 'Addeddate',
        ];
    }
}
