<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resprojectowner".
 *
 * @property integer $id
 * @property integer $builderid
 *
 * @property Builder $builder
 */
class Resprojectowner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resprojectowner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['builderid'], 'required'],
            [['builderid'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'builderid' => 'Builderid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuilder()
    {
        return $this->hasOne(Builder::className(), ['id' => 'builderid']);
    }
}
