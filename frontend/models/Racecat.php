<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "racecat".
 *
 * @property int $id
 * @property string $racetype_id ประเภทการวิ่ง
 * @property string $racecatname รุ่นในการวิ่ง
 * @property string $limit จำกัดจำนวน
 */
class Racecat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'racecat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['racetype_id'], 'string', 'max' => 2],
            [['racecatname'], 'string', 'max' => 150],
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
            'racetype_id' => 'ประเภทการวิ่ง',
            'racecatname' => 'รุ่นในการวิ่ง',
            'limit' => 'จำกัดจำนวน',
        ];
    }
}
