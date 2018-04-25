<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respropertyowner".
 *
 * @property integer $id
 * @property integer $respropertyid
 * @property integer $builderid
 */
class Respropertyowner extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'respropertyowner';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['respropertyid', 'builderid'], 'required'],
            [['respropertyid', 'builderid'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'respropertyid' => 'Respropertyid',
            'builderid' => 'Builderid',
        ];
    }
}
