<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blogimages".
 *
 * @property integer $id
 * @property integer $blogid
 * @property string $type
 * @property string $path
 * @property integer $status
 * @property string $date
 */
class Blogimages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blogimages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['blogid', 'type', 'path', 'status'], 'required'],
            [['blogid', 'status'], 'integer'],
            [['date'], 'safe'],
            [['type'], 'string', 'max' => 300],
            [['path'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blogid' => 'Blogid',
            'type' => 'Type',
            'path' => 'Path',
            'status' => 'Status',
            'date' => 'Date',
        ];
    }
}
