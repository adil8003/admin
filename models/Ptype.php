<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ptype".
 *
 * @property integer $crm_id
 * @property integer $propertytypeid
 */
class Ptype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ptype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['crm_id', 'propertytypeid'], 'required'],
            [['crm_id', 'propertytypeid'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'crm_id' => 'Crm ID',
            'propertytypeid' => 'Propertytypeid',
        ];
    }
}
