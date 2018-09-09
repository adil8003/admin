<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagegallery".
 *
 * @property integer $id
 * @property integer $residentialid
 * @property integer $commercialid
 * @property integer $rentid
 * @property integer $resaleid
 * @property string $image
 * @property integer $type
 * @property string $imgtype
 * @property integer $statusid
 * @property string $addeddate
 */
class Imagegallery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imagegallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['residentialid', 'commercialid', 'rentid', 'resaleid', 'type', 'statusid'], 'integer'],
            [['image', 'type', 'imgtype', 'statusid'], 'required'],
            [['addeddate'], 'safe'],
            [['image'], 'string', 'max' => 700],
            [['imgtype'], 'string', 'max' => 200]
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
            'commercialid' => 'Commercialid',
            'rentid' => 'Rentid',
            'resaleid' => 'Resaleid',
            'image' => 'Image',
            'type' => 'Type',
            'imgtype' => 'Imgtype',
            'statusid' => 'Statusid',
            'addeddate' => 'Addeddate',
        ];
    }
}
