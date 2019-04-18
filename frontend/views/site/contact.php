<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'ติดต่อสอบถาม';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <div class="row">
     <!-- col1 --> 
        <div class="col-md-7">       
           <div class="panel panel-info"> 
                <div class="panel-heading"> <h3 class="panel-title  text-center">ช่องทางติดต่อเรา (Contact)</h3></div>
                    <div class="panel-body">             


                     <!-- ที่อยู่/Address -->   
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-address-card-o fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">ที่อยู่/Address</h4>
                                    เลขที่ 213 ที่ว่าการอำเภอปากพะยูน ถ. ปากพะยูน -​ หารเทา อ. ปากพะยูน จ. พัทลุง 93120
                            </div>
                        </div>
                     <!-- เบอร์โทรศัพท์/Phone -->
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-phone-square fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">เบอร์โทรศัพท์/แฟกซ์</h4>
                                    074-699130 (ที่ว่าการอำเภอ)
                            </div>
                        </div>
                     <!-- แฟกซ์/Fax -->    
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-fax fa-2x" aria-hidden="true"></i>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">แฟกซ์/Fax</h4>
                                    074-699130 (สำนักงาน)
                            </div>
                        </div>
                     <!-- อีเมล/Email -->    
                     <div class="media">
                         <div class="media-left">
                             <i class="fa fa-envelope-o fa-2x" aria-hidden="true"></i>
                         </div>
                         <div class="media-body">
                             <h4 class="media-heading">อีเมล/Email</h4>
                                pakpayoonmini@gmail.com​ (ทะเบียนกลาง)<br>
                                run62.pakyun@gmail.com (ผู้ดูแลระบบ)
                         </div>
                     </div>
                    <!-- เฟสบุ๊ค/Facebook -->  
                     <div class="media">
                        <div class="media-left">
                            <i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">เฟสบุ๊ค/Facebook</h4>
                            <p>ปากพะยูนมินิมาราธอน  <a target ="_blank" href="https://www.facebook.com/ปากพะยูนมินิมาราธอน-343983906108833/">https://www.facebook.com/ปากพะยูนมินิมาราธอน-343983906108833/</a> </p>
                        </div>
                    </div>
                    <!-- ไลน์ไอดี/Line ID -->  
                     <div class="media">
                         <div class="row">
                                <div class="col-xs-6 col-md-4">
                                    <div class="media-body text-center">
                                        <div class="img-rounded"> 
                                            <?php echo Html::img('images/line.jpg', ['class' => 'img-responsive']); ?>    
                                        </div>
                                        <p class="text-center">ไลน์กลุ่ม/Line group</p>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4">
                                    <div class="media-body text-center">
                                        <div class="img-rounded"> 
                                            <?php echo Html::img('images/facebook.png', ['class' => 'img-responsive']); ?>    
                                        </div>
                                        <p class="text-center">เฟสบุ๊ค/Facebook</p>
                                    </div>
                                </div>
                        </div>
                    </div>
                    </div>
            </div>
        </div>


    <!-- col2 -->  
        <div class="col-md-5">
            <div class="panel panel-info"> 
                <div class="panel-heading"> <h3 class="panel-title  text-center">แผนที่ (Map)</h3></div>
                <div class="panel-body"> 
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18822.98857851979!2d100.31343263126762!3d7.348742313027242!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xce74f17b238cc726!2z4LiX4Li14LmI4Lin4LmI4Liy4LiB4Liy4Lij4Lit4Liz4LmA4Lig4Lit4Lib4Liy4LiB4Lie4Liw4Lii4Li54LiZ!5e0!3m2!1sth!2sth!4v1553009305009" width="450" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div> 
                </div> 
            </div>
        </div> 

    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>