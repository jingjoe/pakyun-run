<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Payment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payment-form">
<div class="row">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?> 
    
    
    <!-- cal1 -->
            <div class="col-md-6">
                <div class="panel panel-info"> 
                    <div class="panel-heading"> <h3 class="panel-title  text-center">ขันตอนการแจ้งชำระเงิน (Payment Step)</h3></div>
                    <div class="panel-body"> 
                        <?php echo Html::img('images/logo_payment.png', ['class' => 'img-responsive']); ?>
                    </div> 
                </div>
            </div>
    <!-- cal/ --> 
    <div class="col-md-6">
        <div class="panel panel-info"> 
            <div class="panel-heading"> <h3 class="panel-title  text-center">แจ้งชำระเงิน (Payment)</h3></div>
            <div class="panel-body">
  

                <?= $form->field($model, 'regis_id')->textInput(['maxlength' => true]) ?>
        
                <?= $form->field($model, 'mobile')->textInput(['placeholder' => "8888888888",'maxlength' => true]) ?>
          
                <?= $form->field($model, 'email')->textInput(['placeholder' => "run62.pakyun@gmail.com",'maxlength' => true]) ?>
        
                <?php
                  echo '<label class="control-label">วันที่ชำระเงิน (ปีคศ.-เดือน-วัน)</label>';
                  echo DatePicker::widget([
                      'model' => $model,
                      'attribute' => 'payment_date',
                      'language' => 'th',
                     // 'options' => ['placeholder' => 'ปีคศ.-เดือน-วัน'],
                      'layout' => '{picker}{input}',
                      'pluginOptions' => [
                          'todayHighlight' => true,
                          'todayBtn' => true,
                          'format' => 'yyyy-mm-dd',
                          'autoclose' => true,
                      ]
                  ]);
                ?>
       
                <?php
                 echo '<label class="control-label">เวลา (ชั่วโมง:นาที:วินาที)</label>';
                 echo TimePicker::widget([
                     'model' => $model,
                     'attribute' => 'payment_time',
                     //'options' => ['placeholder' => 'ชั่วโมง:นาที:วินาที'],
                     'pluginOptions' => [
                         'showSeconds' => true,
                         'showMeridian' => false,
                         'minuteStep' => 1,
                         'secondStep' => 5,
                     ],
                     'options' => [
                         'class' => 'form-control',
                     ],
                 ]);
                ?>
          
                <?= $form->field($model, 'price')->textInput(['type' => 'number']) ?>
       

            <?= $form->field($model, 'files')->widget(FileInput::classname(), [
                        //'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'initialPreview' => empty($model->files) ? [] : [Yii::getAlias('@web') . '/bill/' . $model->files],
                            'allowedFileExtensions' => ['gif','jpg','jpeg','png'],
                            'showPreview' => true,
                            'showCaption' => true,
                            'showRemove' => true,
                            'showUpload' => false
                        ]
                ]);
            ?>
            <p class="help-block"><font color="red">*รองรับนามสกุล gif,jpg,jpeg,png เท่านั้น !</font></p>

           
            <div class="form-group">
                <?= Html::submitButton('<i class="fa fa-floppy-o" aria-hidden="true"></i> ' . ($model->isNewRecord ? 'บันทึก' : 'แก้ไข'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-default') . ' btn-lg btn-block']) ?>
            </div>  

    <?php ActiveForm::end(); ?>
             </div> 
                </div>
        </div>   
</div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>