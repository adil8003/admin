<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comprojectpreferred".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Comextradetails[] $comextradetails
 */
class Comprojectpreferred extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comprojectpreferred';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComextradetails()
    {
        return $this->hasMany(Comextradetails::className(), ['preferredid' => 'id']);
    }
}
