<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "builder".
 *
 * @property integer $id
 * @property string $name
 * @property string $companyname
 * @property string $contact
 * @property string $email
 * @property string $website
 * @property integer $addedby
 * @property string $status
 * @property string $officecontact
 * @property string $logopath
 * @property string $picpath
 * @property string $description
 * @property string $addeddate
 *
 * @property Comproject[] $comprojects
 * @property Resproject[] $resprojects
 * @property Resproperty[] $resproperties
 */
class Builder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'builder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['addedby'], 'integer'],
            [['description'], 'string'],
            [['addeddate'], 'safe'],
            [['name', 'companyname', 'contact', 'email', 'website', 'officecontact', 'logopath', 'picpath'], 'string', 'max' => 700],
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
            'name' => 'Name',
            'companyname' => 'Companyname',
            'contact' => 'Contact',
            'email' => 'Email',
            'website' => 'Website',
            'addedby' => 'Addedby',
            'status' => 'Status',
            'officecontact' => 'Officecontact',
            'logopath' => 'Logopath',
            'picpath' => 'Picpath',
            'description' => 'Description',
            'addeddate' => 'Addeddate',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComprojects()
    {
        return $this->hasMany(Comproject::className(), ['builderid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResprojects()
    {
        return $this->hasMany(Resproject::className(), ['builderid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResproperties()
    {
        return $this->hasMany(Resproperty::className(), ['builderid' => 'id']);
    }
}
