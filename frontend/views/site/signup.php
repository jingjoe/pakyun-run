<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ลงทะเบียนผู้ใช้งาน';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>ลงทะเบียนผู้ใช้งาน</h4>
                </div>
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'username')->textInput(['placeholder'=>'ชื่อผู้ใช้','autofocus' => true]) ?>
                    <?= $form->field($model,'email')->textInput(['placeholder'=>'อีเมล','class'=>'form-control col-lg-4'])->label(true); ?>
                    <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'รหัสผ่านไม่น้อยกว่า 6 หลัก','required'=>true]) ?>

                   <div class="form-group">
                        <?= Html::submitButton('ลงทะเบียน', ['class' => 'btn btn-success btn-block', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>       
    </div>
</div>