<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resalemicrositedetails".
 *
 * @property integer $id
 * @property string $featuresheading1
 * @property string $heading1details
 * @property string $featuresheading2
 * @property string $heading2details
 * @property string $featuresheading3
 * @property string $heading3details
 * @property string $featuresheading4
 * @property string $heading4details
 * @property string $aboutuscontent
 * @property integer $resalepropertyid
 *
 * @property Resaleproperty[] $resaleproperties
 */
class Resalemicrositedetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resalemicrositedetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['heading1details', 'heading2details', 'heading3details', 'heading4details', 'aboutuscontent'], 'string'],
            [['resalepropertyid'], 'integer'],
            [['featuresheading1', 'featuresheading2', 'featuresheading3', 'featuresheading4'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'featuresheading1' => 'Featuresheading1',
            'heading1details' => 'Heading1details',
            'featuresheading2' => 'Featuresheading2',
            'heading2details' => 'Heading2details',
            'featuresheading3' => 'Featuresheading3',
            'heading3details' => 'Heading3details',
            'featuresheading4' => 'Featuresheading4',
            'heading4details' => 'Heading4details',
            'aboutuscontent' => 'Aboutuscontent',
            'resalepropertyid' => 'Resalepropertyid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResaleproperties()
    {
        return $this->hasMany(Resaleproperty::className(), ['resalemicrositedetailsid' => 'id']);
    }
}
