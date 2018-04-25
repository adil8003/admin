<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "financialbigcontent".
 *
 * @property integer $id
 * @property string $module
 * @property string $page
 * @property string $content
 * @property string $status
 * @property string $updateddate
 */
class Financialbigcontent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'financialbigcontent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module', 'page', 'content', 'status'], 'required'],
            [['content'], 'string'],
            [['updateddate'], 'safe'],
            [['module', 'page', 'status'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'module' => 'Module',
            'page' => 'Page',
            'content' => 'Content',
            'status' => 'Status',
            'updateddate' => 'Updateddate',
        ];
    }
}
