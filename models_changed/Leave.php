<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "leave".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $leavetypeid
 * @property double $days
 * @property string $todate
 * @property string $fromdate
 * @property integer $appliedby
 * @property integer $approvedby
 * @property string $comment
 * @property string $status
 * @property string $applieddate
 */
class Leave extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'leave';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'leavetypeid', 'days', 'todate', 'fromdate', 'appliedby', 'approvedby', 'status'], 'required'],
            [['description', 'comment'], 'string'],
            [['leavetypeid', 'appliedby', 'approvedby'], 'integer'],
            [['days'], 'number'],
            [['todate', 'fromdate', 'applieddate'], 'safe'],
            [['title'], 'string', 'max' => 700],
            [['status'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'leavetypeid' => 'Leavetypeid',
            'days' => 'Days',
            'todate' => 'Todate',
            'fromdate' => 'Fromdate',
            'appliedby' => 'Appliedby',
            'approvedby' => 'Approvedby',
            'comment' => 'Comment',
            'status' => 'Status',
            'applieddate' => 'Applieddate',
        ];
    }
}
