<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plots".
 *
 * @property integer $id
 * @property string $saleorrent
 * @property string $areapersquarefeet
 * @property string $areaperguntha
 * @property string $areaperacre
 * @property string $zone
 * @property string $letigation
 * @property string $price
 * @property string $distancefrompune
 * @property string $location
 * @property string $detailedaddress
 * @property string $demarkation
 * @property string $otherdetails
 * @property string $view
 * @property string $road
 * @property string $ownername
 * @property string $contact
 * @property string $status
 * @property string $addeddate
 * @property string $videolink
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
            [['letigation', 'detailedaddress', 'demarkation', 'otherdetails', 'videolink'], 'string'],
            [['status'], 'required'],
            [['addeddate'], 'safe'],
            [['saleorrent', 'areapersquarefeet', 'areaperguntha', 'areaperacre', 'zone', 'price', 'location', 'view', 'road'], 'string', 'max' => 500],
            [['distancefrompune'], 'string', 'max' => 1000],
            [['ownername', 'contact'], 'string', 'max' => 700],
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
            'saleorrent' => 'Saleorrent',
            'areapersquarefeet' => 'Areapersquarefeet',
            'areaperguntha' => 'Areaperguntha',
            'areaperacre' => 'Areaperacre',
            'zone' => 'Zone',
            'letigation' => 'Letigation',
            'price' => 'Price',
            'distancefrompune' => 'Distancefrompune',
            'location' => 'Location',
            'detailedaddress' => 'Detailedaddress',
            'demarkation' => 'Demarkation',
            'otherdetails' => 'Otherdetails',
            'view' => 'View',
            'road' => 'Road',
            'ownername' => 'Ownername',
            'contact' => 'Contact',
            'status' => 'Status',
            'addeddate' => 'Addeddate',
            'videolink' => 'Videolink',
        ];
    }
}
