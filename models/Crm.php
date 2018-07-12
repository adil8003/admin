<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crm".
 *
 * @property integer $id
 * @property string $cname
 * @property string $cphone
 * @property integer $propertytypeid
 * @property integer $buytypeid
 * @property double $price
 * @property string $location
 * @property string $meetingstatus
 * @property integer $meetingtypeid
 * @property string $detailsofproperty
 * @property string $postremark
 * @property string $remark
 * @property string $finalstatus
 * @property string $addeddate
 * @property string $reffrom
 * @property integer $statusid
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
            [['cname', 'cphone', 'propertytypeid', 'buytypeid', 'price', 'location', 'meetingstatus', 'meetingtypeid', 'detailsofproperty', 'postremark', 'remark', 'finalstatus', 'reffrom', 'statusid'], 'required'],
            [['propertytypeid', 'buytypeid', 'meetingtypeid', 'statusid'], 'integer'],
            [['price'], 'number'],
            [['addeddate'], 'safe'],
            [['cname', 'location', 'meetingstatus'], 'string', 'max' => 500],
            [['cphone', 'detailsofproperty', 'postremark', 'remark', 'finalstatus'], 'string', 'max' => 700],
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
            'propertytypeid' => 'Propertytypeid',
            'buytypeid' => 'Buytypeid',
            'price' => 'Price',
            'location' => 'Location',
            'meetingstatus' => 'Meetingstatus',
            'meetingtypeid' => 'Meetingtypeid',
            'detailsofproperty' => 'Detailsofproperty',
            'postremark' => 'Postremark',
            'remark' => 'Remark',
            'finalstatus' => 'Finalstatus',
            'addeddate' => 'Addeddate',
            'reffrom' => 'Reffrom',
            'statusid' => 'Statusid',
        ];
    }
}
