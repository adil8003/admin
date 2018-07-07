<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "crm".
 *
 * @property integer $id
 * @property string $cname
 * @property string $cphone
 * @property integer $ptypeid
 * @property integer $buytypeid
 * @property double $price
 * @property string $location
 * @property integer $meetingstatus
 * @property integer $meetingtypeid
 * @property string $detailsofproperty
 * @property string $postremark
 * @property string $remark
 * @property string $finalstatus
 * @property string $followupdate
 * @property string $addeddate
 * @property string $Reffrom
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
            [['cname', 'cphone', 'ptypeid', 'buytypeid', 'price', 'location', 'meetingstatus', 'meetingtypeid', 'detailsofproperty', 'postremark', 'remark', 'finalstatus', 'followupdate', 'Reffrom'], 'required'],
            [['ptypeid', 'buytypeid', 'meetingstatus', 'meetingtypeid'], 'integer'],
            [['price'], 'number'],
            [['followupdate', 'addeddate'], 'safe'],
            [['cname', 'location'], 'string', 'max' => 500],
            [['cphone', 'detailsofproperty', 'postremark', 'remark', 'finalstatus'], 'string', 'max' => 700],
            [['Reffrom'], 'string', 'max' => 200]
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
            'ptypeid' => 'Ptypeid',
            'buytypeid' => 'Buytypeid',
            'price' => 'Price',
            'location' => 'Location',
            'meetingstatus' => 'Meetingstatus',
            'meetingtypeid' => 'Meetingtypeid',
            'detailsofproperty' => 'Detailsofproperty',
            'postremark' => 'Postremark',
            'remark' => 'Remark',
            'finalstatus' => 'Finalstatus',
            'followupdate' => 'Followupdate',
            'addeddate' => 'Addeddate',
            'Reffrom' => 'Reffrom',
        ];
    }
}
