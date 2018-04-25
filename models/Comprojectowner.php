<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comprojectowner".
 *
 * @property integer $id
 * @property integer $comprojectid
 * @property integer $builderid
 *
 * @property Comproject $comproject
 */
class Comprojectowner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comprojectowner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comprojectid', 'builderid'], 'required'],
            [['comprojectid', 'builderid'], 'integer']
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
            'builderid' => 'Builderid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComproject()
    {
        return $this->hasOne(Comproject::className(), ['id' => 'comprojectid']);
    }
}
