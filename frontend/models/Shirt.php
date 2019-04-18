<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "shirt".
 *
 * @property int $id
 * @property string $shirtname เสื้อ
 * @property string $price ราคา
 */
class Shirt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'shirt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shirtname'], 'string', 'max' => 150],
            [['price'], 'string', 'max' => 3],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'shirtname' => 'เสื้อ/size',
            'price' => 'ราคา',
        ];
    }
}
