<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imggallery".
 *
 * @property integer $id
 * @property integer $residentialid
 * @property integer $rentid
 * @property integer $resaleid
 * @property string $image
 * @property integer $type
 * @property integer $statusid
 * @property string $addeddate
 */
class Imggallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imggallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['residentialid', 'rentid', 'resaleid', 'image', 'type', 'statusid'], 'required'],
            [['residentialid', 'rentid', 'resaleid', 'type', 'statusid'], 'integer'],
            [['addeddate'], 'safe'],
            [['image'], 'string', 'max' => 700]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'residentialid' => 'Residentialid',
            'rentid' => 'Rentid',
            'resaleid' => 'Resaleid',
            'image' => 'Image',
            'type' => 'Type',
            'statusid' => 'Statusid',
            'addeddate' => 'Addeddate',
        ];
    }
}
