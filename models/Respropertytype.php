<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respropertytype".
 *
 * @property integer $residentialid
 * @property integer $propertytypeid
 */
class Respropertytype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'respropertytype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['residentialid', 'propertytypeid'], 'required'],
            [['residentialid', 'propertytypeid'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'residentialid' => 'Residentialid',
            'propertytypeid' => 'Propertytypeid',
        ];
    }
}
