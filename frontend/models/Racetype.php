<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "racetype".
 *
 * @property int $id
 * @property string $racename ประเภทการวิ่ง
 * @property string $price ราคา
 * @property string $limit จำกัดจำนวน
 */
class Racetype extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'racetype';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['racename'], 'string', 'max' => 150],
            [['price'], 'string', 'max' => 3],
            [['limit'], 'string', 'max' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'racename' => 'ประเภทการวิ่ง',
            'price' => 'ราคา',
            'limit' => 'จำกัดจำนวน',
        ];
    }
}
