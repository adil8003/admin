<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respropertytype".
 *
 * @property integer $id
 * @property integer $aboutpropertyid
 * @property integer $flattypeid
 * @property string $noofbedroom
 * @property string $noofbathroom
 * @property string $noofbalcony
 * @property string $dinningspace
 * @property string $parkingtype
 * @property string $furnishtype
 * @property string $flooring
 * @property string $sanctionauthority
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
            [['aboutpropertyid', 'flattypeid'], 'integer'],
            [['noofbedroom', 'noofbathroom', 'noofbalcony', 'dinningspace', 'flooring', 'sanctionauthority'], 'string'],
            [['parkingtype', 'furnishtype'], 'string', 'max' => 300]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'aboutpropertyid' => 'Aboutpropertyid',
            'flattypeid' => 'Flattypeid',
            'noofbedroom' => 'Noofbedroom',
            'noofbathroom' => 'Noofbathroom',
            'noofbalcony' => 'Noofbalcony',
            'dinningspace' => 'Dinningspace',
            'parkingtype' => 'Parkingtype',
            'furnishtype' => 'Furnishtype',
            'flooring' => 'Flooring',
            'sanctionauthority' => 'Sanctionauthority',
        ];
    }
}
