<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "blog".
 *
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property string $status
 * @property string $tags
 * @property string $date
 * @property string $blogimage
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body', 'status', 'tags'], 'required'],
            [['body'], 'string'],
            [['date'], 'safe'],
            [['title'], 'string', 'max' => 500],
            [['status', 'tags'], 'string', 'max' => 100],
            [['blogimage'], 'string', 'max' => 700]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'body' => 'Body',
            'status' => 'Status',
            'tags' => 'Tags',
            'date' => 'Date',
            'blogimage' => 'Blogimage',
        ];
    }
}
