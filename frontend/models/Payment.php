<?php

namespace frontend\models;

use Yii;
use yii\helpers\Url;
use yii\db\Expression;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use \yii\db\ActiveRecord;
use yii\web\UploadedFile;

//  models import
use frontend\models\Register;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property string $regis_id เลขที่ใบสมัคร
 * @property string $mobile เบอร์โทรศัพท์
 * @property string $email อีเมล
 * @property string $payment_date วันที่ชำระเงิน
 * @property string $payment_time เวลาชำระเงิน
 * @property string $price จำนวนเงิน
 * @property string $token_upload
 * @property string $files หลักฐานการโอนเงิน/สลิป
 * @property string $registration_ip เลขไอพี
 * @property string $create_date วันบันทึก
 */
class Payment extends \yii\db\ActiveRecord
{  

    const DOC_PATH = 'bill';
    public $foler_upload ='bill';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['regis_id', 'mobile', 'payment_date', 'payment_time', 'price', 'create_date'], 'required'],
            [['payment_date', 'payment_time', 'create_date'], 'safe'],
            [['regis_id'], 'string', 'max' => 8],
            [['mobile'], 'string', 'max' => 10],
            [['price'], 'number', 'numberPattern' => '/^\s*[-+]?[0-9]*[.,]?[0-9]+([eE][-+]?[0-9]+)?\s*$/'],
            [['price'],'number'],
            [['email'], 'string', 'max' => 50],
            //['email', 'email'],
            [['user_conf','token_upload'], 'string', 'max' => 100],
            [['registration_ip'], 'string', 'max' => 45],
            [['confirm'], 'string', 'max' => 1],
            [['files'], 'file'], //extensions' => 'cds,txt,sql'

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'regis_id' => 'เลขที่ใบสมัคร',
            'mobile' => 'เบอร์โทรศัพท์',
            'email' => 'อีเมล',
            'payment_date' => 'วันที่ชำระเงิน',
            'payment_time' => 'เวลาชำระเงิน',
            'price' => 'จำนวนเงิน',
            'token_upload' => 'Token Upload',
            'files' => 'หลักฐานการโอนเงิน/สลิป',
            'registration_ip' => 'เลขไอพี',
            'confirm' => 'สถานะการยืนยัน',
            'user_conf' => 'ยืนยันโดย',
            'create_date' => 'วันบันทึก',
            
        // เพิ่มฟิวล์ใหม่ จาก funtion get  relation
            'personname' => 'ชื่อ-นามสกุล',
        ];
    }
    
           
 // get ชื่อ-นามสกุล
    public function getPerson() {
        return @$this->hasOne(Register::className(), ['regis_id' => 'regis_id']);
    }
    public function getPersonname() {
        return @$this->person->fullname;
    } 
    
  
    // Function upload files.


    public function getUploadPath(){
      return Yii::getAlias('@webroot').'/'.$this->foler_upload.'/';
    }

    public function getUploadUrl(){
      return Yii::getAlias('@web').'/'.$this->foler_upload.'/';
    }

    

    public function getPhotosViewer(){
      $image = $this->files ? @explode(',',$this->files) : [];
      $img = '';
      foreach ($image as  $image) {
        $img.= ' '.Html::img($this->getUploadUrl().$image,['class'=>'img-thumbnail','style'=>'max-width:300px;']);
      }
      return $img;
    }


}
