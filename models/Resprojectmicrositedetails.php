<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resprojectmicrositedetails".
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
 *
 * @property Resproject[] $resprojects
 */
class Resprojectmicrositedetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resprojectmicrositedetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['featuresheading1', 'heading1details', 'featuresheading2', 'heading2details', 'featuresheading3', 'heading3details', 'featuresheading4', 'heading4details', 'aboutuscontent'], 'string']
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResprojects()
    {
        return $this->hasMany(Resproject::className(), ['resprojectmicrositedetailsid' => 'id']);
    }
}
