<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comprojectimage".
 *
 * @property integer $id
 * @property integer $comprojectid
 * @property string $type
 * @property string $path
 * @property integer $status
 * @property string $addeddate
 */
class Comprojectimage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comprojectimage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comprojectid', 'type', 'path', 'status'], 'required'],
            [['comprojectid', 'status'], 'integer'],
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
            'comprojectid' => 'Comprojectid',
            'type' => 'Type',
            'path' => 'Path',
            'status' => 'Status',
            'addeddate' => 'Addeddate',
        ];
    }
}
