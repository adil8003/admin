<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resprojectproject".
 *
 * @property integer $id
 * @property string $yearofconstruct
 * @property string $yearofpossion
 * @property integer $ownershiptypeid
 * @property string $nooftower
 * @property string $nooffloor
 * @property string $noofflatperfloor
 * @property string $noofrowhouse
 * @property string $villa
 * @property string $commercialshop
 * @property string $comment
 *
 * @property Resproject[] $resprojects
 */
class Resprojectproject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resprojectproject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['yearofconstruct', 'yearofpossion', 'nooftower', 'nooffloor', 'noofflatperfloor', 'noofrowhouse', 'villa', 'commercialshop', 'comment'], 'string'],
            [['ownershiptypeid'], 'integer']
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
            'yearofpossion' => 'Yearofpossion',
            'ownershiptypeid' => 'Ownershiptypeid',
            'nooftower' => 'Nooftower',
            'nooffloor' => 'Nooffloor',
            'noofflatperfloor' => 'Noofflatperfloor',
            'noofrowhouse' => 'Noofrowhouse',
            'villa' => 'Villa',
            'commercialshop' => 'Commercialshop',
            'comment' => 'Comment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResprojects()
    {
        return $this->hasMany(Resproject::className(), ['resprojectprojectid' => 'id']);
    }
}
