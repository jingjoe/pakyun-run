<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'เข้าสู่ระบบ';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>สำหรับผู้ดูแลระบบ</h4>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?= $form->field($model, 'username')->textInput(['placeholder'=>'ชื่อผู้ใช้','required'=>true,'autofocus'=>true]) ?>
                    <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'รหัสผ่าน','required'=>true]) ?>
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>

                    <?php ActiveForm::end(); ?>
                </div>
                <!-- <div class="social-auth-links text-center">
                    <a href="index.php?r=site/signup" class="text-center">ลงทะเบียนผู้ใช้งาน</a>
                </div>-->
                <br>
            </div>
        </div>       
    </div>      
</div>