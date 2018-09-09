<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crm".
 *
 * @property integer $id
 * @property string $cname
 * @property string $cphone
 * @property string $cemail
 * @property integer $buytypeid
 * @property integer $meetingtypeid
 * @property integer $price
 * @property string $location
 * @property string $meetingstatus
 * @property string $detailsofproperty
 * @property string $postremark
 * @property string $finalstatus
 * @property string $addeddate
 * @property string $reffrom
 * @property integer $customerstatusid
 */
class Crm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'crm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['buytypeid', 'meetingtypeid', 'price', 'customerstatusid'], 'integer'],
            [['addeddate'], 'safe'],
            [['cname', 'cemail', 'location', 'meetingstatus'], 'string', 'max' => 500],
            [['cphone', 'detailsofproperty', 'postremark', 'finalstatus'], 'string', 'max' => 700],
            [['reffrom'], 'string', 'max' => 200]
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
            'cphone' => 'Cphone',
            'cemail' => 'Cemail',
            'buytypeid' => 'Buytypeid',
            'meetingtypeid' => 'Meetingtypeid',
            'price' => 'Price',
            'location' => 'Location',
            'meetingstatus' => 'Meetingstatus',
            'detailsofproperty' => 'Detailsofproperty',
            'postremark' => 'Postremark',
            'finalstatus' => 'Finalstatus',
            'addeddate' => 'Addeddate',
            'reffrom' => 'Reffrom',
            'customerstatusid' => 'Customerstatusid',
        ];
    }
}
