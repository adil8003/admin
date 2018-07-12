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
 * @property double $pland
 * @property string $landmark
 * @property string $address
 * @property integer $propertytypeid
 * @property double $carpetarea
 * @property double $price
 * @property string $reraid
 * @property string $possesiondate
 * @property string $addeddate
 * @property integer $statusid
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
            [['dname', 'pname', 'location', 'buytypeid', 'pland', 'landmark', 'address', 'propertytypeid', 'carpetarea', 'price', 'reraid', 'possesiondate', 'statusid'], 'required'],
            [['buytypeid', 'propertytypeid', 'statusid'], 'integer'],
            [['pland', 'carpetarea', 'price'], 'number'],
            [['possesiondate', 'addeddate'], 'safe'],
            [['dname', 'pname', 'location', 'landmark'], 'string', 'max' => 200],
            [['address'], 'string', 'max' => 700],
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
            'dname' => 'Dname',
            'pname' => 'Pname',
            'location' => 'Location',
            'buytypeid' => 'Buytypeid',
            'pland' => 'Pland',
            'landmark' => 'Landmark',
            'address' => 'Address',
            'propertytypeid' => 'Propertytypeid',
            'carpetarea' => 'Carpetarea',
            'price' => 'Price',
            'reraid' => 'Reraid',
            'possesiondate' => 'Possesiondate',
            'addeddate' => 'Addeddate',
            'statusid' => 'Statusid',
        ];
    }
}
