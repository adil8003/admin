<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "residential".
 *
 * @property integer $id
 * @property string $dname
 * @property string $pname
 * @property string $location
 * @property integer $buytypeid
 * @property string $pland
 * @property string $landmark
 * @property string $address
 * @property string $price
 * @property integer $statusid
 * @property integer $landtypeid
 * @property string $image
 * @property string $addeddate
 * @property integer $protype
 * @property integer $userid
 */
class Residential extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'residential';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dname', 'pname', 'location', 'buytypeid', 'landmark', 'address', 'price', 'statusid', 'landtypeid', 'protype', 'userid'], 'required'],
            [['buytypeid', 'price', 'statusid', 'landtypeid', 'protype', 'userid'], 'integer'],
            [['image'], 'string'],
            [['addeddate'], 'safe'],
            [['dname', 'pname', 'location', 'pland', 'landmark'], 'string', 'max' => 200],
            [['address'], 'string', 'max' => 700]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'dname' => 'Dname',
            'pname' => 'Pname',
            'location' => 'Location',
            'buytypeid' => 'Buytypeid',
            'pland' => 'Pland',
            'landmark' => 'Landmark',
            'address' => 'Address',
            'price' => 'Price',
            'statusid' => 'Statusid',
            'landtypeid' => 'Landtypeid',
            'image' => 'Image',
            'addeddate' => 'Addeddate',
            'protype' => 'Protype',
            'userid' => 'Userid',
        ];
    }
}
