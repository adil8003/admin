<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plots".
 *
 * @property integer $id
 * @property string $ownername
 * @property string $contact
 * @property string $sublocation
 * @property string $location
 * @property string $landmark
 * @property string $zone
 * @property string $areapersquarefeet
 * @property string $saleorrent
 * @property string $areaperguntha
 * @property string $peracre
 * @property string $securitydeposit
 * @property string $sharingratio
 * @property string $expectedprice
 * @property string $detailedaddress
 * @property string $addeddate
 * @property string $status
 * @property string $videolink
 * @property integer $plotgeolocationid
 * @property integer $plotsimageid
 *
 * @property Plotgeolocation $plotgeolocation
 */
class Plots extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plots';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['detailedaddress', 'videolink'], 'string'],
            [['addeddate'], 'safe'],
            [['status'], 'required'],
            [['plotgeolocationid', 'plotsimageid'], 'integer'],
            [['ownername', 'contact', 'landmark'], 'string', 'max' => 700],
            [['sublocation', 'location', 'zone', 'areapersquarefeet', 'saleorrent', 'areaperguntha', 'peracre', 'securitydeposit', 'sharingratio', 'expectedprice'], 'string', 'max' => 500],
            [['status'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ownername' => 'Ownername',
            'contact' => 'Contact',
            'sublocation' => 'Sublocation',
            'location' => 'Location',
            'landmark' => 'Landmark',
            'zone' => 'Zone',
            'areapersquarefeet' => 'Areapersquarefeet',
            'saleorrent' => 'Saleorrent',
            'areaperguntha' => 'Areaperguntha',
            'peracre' => 'Peracre',
            'securitydeposit' => 'Securitydeposit',
            'sharingratio' => 'Sharingratio',
            'expectedprice' => 'Expectedprice',
            'detailedaddress' => 'Detailedaddress',
            'addeddate' => 'Addeddate',
            'status' => 'Status',
            'videolink' => 'Videolink',
            'plotgeolocationid' => 'Plotgeolocationid',
            'plotsimageid' => 'Plotsimageid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlotgeolocation()
    {
        return $this->hasOne(Plotgeolocation::className(), ['id' => 'plotgeolocationid']);
    }
}
