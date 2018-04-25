<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respropertycost".
 *
 * @property integer $id
 * @property string $sale
 * @property string $newproperty
 * @property string $resaleproperty
 * @property string $typeofproperties
 * @property string $rent
 */
class Respropertycost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'respropertycost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sale', 'newproperty', 'resaleproperty', 'typeofproperties', 'rent'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sale' => 'Sale',
            'newproperty' => 'Newproperty',
            'resaleproperty' => 'Resaleproperty',
            'typeofproperties' => 'Typeofproperties',
            'rent' => 'Rent',
        ];
    }
}
