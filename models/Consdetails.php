<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "consdetails".
 *
 * @property integer $id
 * @property integer $residentialid
 * @property integer $resaleid
 * @property integer $rentid
 * @property integer $commercialid
 * @property string $reraid
 * @property string $carpetarea
 * @property string $posdate
 * @property string $posquarter
 * @property integer $propertytypeid
 * @property string $price
 * @property string $wstatus
 * @property string $addeddate
 */
class Consdetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consdetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['residentialid', 'resaleid', 'rentid', 'commercialid', 'propertytypeid', 'price'], 'integer'],
            [['wstatus'], 'string'],
            [['addeddate'], 'safe'],
            [['reraid', 'carpetarea', 'posquarter'], 'string', 'max' => 100],
            [['posdate'], 'string', 'max' => 50]
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
            'resaleid' => 'Resaleid',
            'rentid' => 'Rentid',
            'commercialid' => 'Commercialid',
            'reraid' => 'Reraid',
            'carpetarea' => 'Carpetarea',
            'posdate' => 'Posdate',
            'posquarter' => 'Posquarter',
            'propertytypeid' => 'Propertytypeid',
            'price' => 'Price',
            'wstatus' => 'Wstatus',
            'addeddate' => 'Addeddate',
        ];
    }
}
