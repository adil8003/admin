<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "commercial".
 *
 * @property integer $id
 * @property string $cname
 * @property string $dname
 * @property integer $buytypeid
 * @property integer $ctypeid
 * @property string $location
 * @property string $landmark
 * @property string $address
 * @property integer $price
 * @property string $reraid
 * @property integer $statusid
 * @property string $addeddate
 */
class Commercial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commercial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cname', 'dname', 'buytypeid', 'ctypeid', 'location', 'landmark', 'address', 'price', 'statusid'], 'required'],
            [['buytypeid', 'ctypeid', 'price', 'statusid'], 'integer'],
            [['address'], 'string'],
            [['addeddate'], 'safe'],
            [['cname', 'dname', 'location', 'landmark'], 'string', 'max' => 500],
            [['reraid'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cname' => 'Cname',
            'dname' => 'Dname',
            'buytypeid' => 'Buytypeid',
            'ctypeid' => 'Ctypeid',
            'location' => 'Location',
            'landmark' => 'Landmark',
            'address' => 'Address',
            'price' => 'Price',
            'reraid' => 'Reraid',
            'statusid' => 'Statusid',
            'addeddate' => 'Addeddate',
        ];
    }
}
