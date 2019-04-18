<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "nationality".
 *
 * @property string $id
 * @property string $nationname สัญชาติ
 */
class Nationality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nationality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'string', 'max' => 3],
            [['nationname'], 'string', 'max' => 50],
            [['nationname'], 'unique'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nationname' => 'สัญชาติ',
        ];
    }
}
