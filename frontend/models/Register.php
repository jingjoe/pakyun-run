<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

//  models import
use frontend\models\Racetype;
use frontend\models\Racecat;
use frontend\models\Shirt;
use frontend\models\Nationality;
use frontend\models\Status;

/**
 * This is the model class for table "register".
 *
 * @property int $id
 * @property string $regis_id เลขที่ใบสมัคร
 * @property string $fullname ชื่อ-นามสกุล
 * @property string $birthday วันเกิด
 * @property string $sex เพศ
 * @property string $age อายุ/ปี
 * @property string $nationality_id สัญชาติ
 * @property string $team สังกัด/ชมรม
 * @property string $address ที่อยู่
 * @property string $mobile เบอร์โทรศัพท์มือถือ
 * @property string $email อีเมล
 * @property string $racetype_id ประเภทการวิ่ง
 * @property string $racecat_id รุ่นในการวิ่ง
 * @property string $shirt_id เสื้อ/size
 * @property string $confirm ยืนยัน
 * @property string $status สถานะ
 * @property string $registration_ip เลขไอพี
 * @property string $create_date วันที่สมัคร
 */
class Register extends \yii\db\ActiveRecord
{
    
    const CONFIRM = 'N';
    const STATUS = 1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'register';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'birthday', 'sex', 'age', 'nationality_id', 'mobile', 'address','racetype_id', 'racecat_id', 'shirt_id'], 'required'],
            [['create_date'], 'safe'],
            //['email', 'email'],
            [['regis_id'], 'string', 'max' => 8],
            [['fullname', 'team'], 'string', 'max' => 100],
            [['sex', 'mobile'], 'string', 'max' => 10],
            [['bloodgroup','age', 'racetype_id', 'racecat_id', 'shirt_id'], 'string', 'max' => 2],
            [['nationality_id'], 'string', 'max' => 3],
            [['historydiseases','address', 'email'], 'string', 'max' => 255],
            [['confirm', 'status'], 'string', 'max' => 1],
            
            ['confirm', 'default', 'value' => self::CONFIRM],
            ['confirm', 'in', 'range' => [self::CONFIRM]],
            ['status', 'default', 'value' => self::STATUS],
            ['status', 'in', 'range' => [self::STATUS]],
            ];
    }
//    public function behaviors()
//    {
//        return [
//            [
//            'class' => TimestampBehavior::className(),
//            'createdAtAttribute' => 'create_date',
//            'updatedAtAttribute' => 'create_date',
//            'value' => new Expression('NOW()'),
//            ]
//        ];
//    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'regis_id' => 'เลขที่ใบสมัคร',
            'fullname' => 'ชื่อ-นามสกุล/Full Name',
            'birthday' => 'วันเกิด/Date of Birth',
            'sex' => 'เพศ/Gender',
            'age' => 'อายุ(ปี)/Age',
            'nationality_id' => 'สัญชาติ/Nationality',
            'team' => 'สังกัดทีม-ชมรม (ถ้ามี)/Team-Club',
            'address' => 'ที่อยู่/Address',
            'mobile' => 'เบอร์โทรศัพท์/Mobile Phone',
            'email' => 'อีเมล (ถ้ามี)/Email',
            'bloodgroup' => 'กรุ๊ปเลือด/Blood Group',
            'historydiseases' => 'ประวัติโรคประจำตัว (ถ้ามี)/HPI',
            'racetype_id' => 'ประเภทการวิ่ง/Type Race',
            'racecat_id' => 'รุ่นในการวิ่ง/Race Category',
            'shirt_id' => 'ไซส์เสื้อ (ขนาดรอบอก)/Size of shirt',
            'confirm' => 'ยืนยัน',
            'status' => 'สถานะ',
            'registration_ip' => 'เลขไอพี',
            'create_date' => 'วันที่สมัคร',
            
            // เพิ่มฟิวล์ใหม่ จาก funtion get  relation
            'nationname' => 'สัญชาติ',
            'racetypename' => 'ประเภทการวิ่ง',
            'racecatname' => 'รุ่นในการวิ่ง',
            'shirename' => 'เสื้อ/size',
            'stname' => 'สถานะ',

        ];
    }
    
       
 // get ชื่อสัญชาติ
    public function getNation() {
        return @$this->hasOne(Nationality::className(), ['id' => 'nationality_id']);
    }
    public function getNationname() {
        return @$this->nation->nationname;
    } 
    
           
 // get ประเภทการวิ่ง
    public function getRacetype() {
        return @$this->hasOne(Racetype::className(), ['id' => 'racetype_id']);
    }
    public function getRacetypename() {
        return @$this->racetype->racename;
    } 
    
           
 // get รุ่นในการวิ่ง
    public function getRacecat() {
        return @$this->hasOne(Racecat::className(), ['id' => 'racecat_id']);
    }
    public function getRacecatname() {
        return @$this->racecat->racecatname;
    } 
    
 // get เสื้อ/size
    public function getShire() {
        return @$this->hasOne(Shirt::className(), ['id' => 'shirt_id']);
    }
    public function getShirename() {
        return @$this->shire->shirtname;
    } 
    
 // get สถานะ
    public function getSt() {
        return @$this->hasOne(Status::className(), ['id' => 'status']);
    }
    public function getStname() {
        return @$this->st->statusname;
    } 
  
    
 //  สร้างรายการให้เลือก itemAlias  radioList  

    public static function itemAlias($type,$code=NULL) {
        $_items = array(
            'sex' => array(
                '1' => 'ชาย',
                '2' => 'หญิง',
            ),
            'bloodgroup' => array(
                'A' => 'A',
                'B' => 'B',
                'AB' => 'AB',
                'O' => 'O',
                'N' => 'ไม่ทราบ',
            ),
        );    
        if (isset($code)){
            return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
        }
        else{         
            return isset($_items[$type]) ? $_items[$type] : false;    
        }
        
    } 
}
