<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plotsimage".
 *
 * @property integer $id
 * @property integer $plotsid
 * @property string $path
 * @property string $type
 * @property string $status
 * @property string $addeddate
 */
class Plotsimage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plotsimage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['plotsid'], 'integer'],
            [['path'], 'string'],
            [['addeddate'], 'safe'],
            [['type'], 'string', 'max' => 500],
            [['status'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'plotsid' => 'Plotsid',
            'path' => 'Path',
            'type' => 'Type',
            'status' => 'Status',
            'addeddate' => 'Addeddate',
        ];
    }
}
