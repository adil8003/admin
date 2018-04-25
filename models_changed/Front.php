<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "front".
 *
 * @property integer $id
 * @property string $name
 * @property string $image
 * @property string $price
 * @property string $bedroom
 * @property string $bathroom
 * @property string $parking
 * @property string $area
 */
class Front extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'front';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'image', 'price', 'bedroom', 'bathroom', 'parking', 'area'], 'required'],
            [['name', 'image', 'price', 'bedroom', 'bathroom', 'parking', 'area'], 'string', 'max' => 500]
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
            'image' => 'Image',
            'price' => 'Price',
            'bedroom' => 'Bedroom',
            'bathroom' => 'Bathroom',
            'parking' => 'Parking',
            'area' => 'Area',
        ];
    }
}
