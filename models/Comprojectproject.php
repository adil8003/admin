<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comprojectproject".
 *
 * @property integer $id
 * @property string $yearofconstruct
 * @property string $yearofposition
 * @property string $age
 * @property string $totalfloor
 * @property string $floorno
 * @property integer $commercialprojtypeid
 * @property string $totalsqfeet
 * @property string $costpersqfeet
 * @property string $othercharges
 * @property string $comments
 *
 * @property Comproject[] $comprojects
 */
class Comprojectproject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comprojectproject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['yearofconstruct', 'yearofposition', 'age', 'totalfloor', 'floorno', 'totalsqfeet', 'costpersqfeet', 'othercharges'], 'string'],
            [['commercialprojtypeid'], 'integer'],
            [['comments'], 'string', 'max' => 225]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'yearofconstruct' => 'Yearofconstruct',
            'yearofposition' => 'Yearofposition',
            'age' => 'Age',
            'totalfloor' => 'Totalfloor',
            'floorno' => 'Floorno',
            'commercialprojtypeid' => 'Commercialprojtypeid',
            'totalsqfeet' => 'Totalsqfeet',
            'costpersqfeet' => 'Costpersqfeet',
            'othercharges' => 'Othercharges',
            'comments' => 'Comments',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojects()
    {
        return $this->hasMany(Comproject::className(), ['comprojectprojectid' => 'id']);
    }
}
