<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\VarDumper;
use yii\helpers\Url;
use kartik\widgets\DatePicker;
use kartik\widgets\TimePicker;
use kartik\checkbox\CheckboxX;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\widgets\DepDrop;

// ลิงค์โมดูล dropdownlist
use frontend\models\Racetype;
use frontend\models\Racecat;

use frontend\models\Shirt;
use frontend\models\Nationality;

/* @var $this yii\web\View */
/* @var $model frontend\models\Register */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="register-form">
    <div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <!-- cal1 -->
            <div class="col-md-6">
                <div class="panel panel-info"> 
                    <div class="panel-heading"> <h3 class="panel-title  text-center">ขันตอนการสมัคร/ลงทะเบียน (Register Step)</h3></div>
                    <div class="panel-body"> 
                        <?php echo Html::img('images/logo_register.png', ['class' => 'img-responsive']); ?>
                    </div> 
                </div>
            </div>
    <!-- cal2 --> 
            <div class="col-md-6">
                <div class="panel panel-info"> 
                   <div class="panel-heading"><h3 class="panel-title text-center">แบบฟอร์มลงทะเบียน (Register Form)</h3> </div> 
                   <div class="panel-body">
                        <?= $form->field($model, 'fullname')->textInput(['placeholder' => "คำนำหน้า ชื่อ  นามสกุล",'maxlength' => true]) ?>
        
                        <?php
                        //echo '<label class="control-label">วันเกิด (หาปี คศ.เอา พศ.เกิด-543)</label>';
                        echo DatePicker::widget([
                            'model' => $model,
                            'form' => $form,
                            'attribute' => 'birthday',
                            'language' => 'th',
                            'options' => ['placeholder' => 'รูปแบบวันเกิด ปีคศ.-เดือน-วัน'],
                            'layout' => '{picker}{input}',
                            'pluginOptions' => [
                                'todayHighlight' => true,
                                'todayBtn' => true,
                                'format' => 'yyyy-mm-dd',
                                'autoclose' => true,
                            ]
                        ]);
                        ?>
                       
                        <?=$form->field($model, 'age')->textInput(['placeholder' => "คำนวณอายุ ปีพ.ศ.ปัจจุบัน-พ.ศ.เกิด",'maxlength' => true]) ?>
                    
                        <?= $form->field($model, 'sex')->label('เพศ/Gender')->inline()->radioList(frontend\models\Register::itemAlias('sex')) ?>  
                     
                        <?= $form->field($model, 'bloodgroup')->label('กรุ๊ปเลือด/Blood Group')->inline()->radioList(frontend\models\Register::itemAlias('bloodgroup')) ?> 
                      
                        <?= $form->field($model, 'nationality_id')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Nationality::find()->all(), 'id', 'nationname'),
                            'options' => ['placeholder' => 'เลือกสัญชาติ'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                        ?>

                        <?= $form->field($model, 'team')->textarea(['rows' => 2,'placeholder' => "ระบุได้มากกว่า 1 สังกัด หรือ ชมรม คั่นด้วยคอมมา",'maxlength' => true]) ?>

                        <?= $form->field($model, 'address')->textarea(['rows' => 2,'placeholder' => "0 หมู่ 0 ต.ปากพะยูน อ.ปากพะยูน จ.พัทลุง 93120",'maxlength' => true]) ?>

                        <?= $form->field($model, 'mobile')->textInput(['placeholder' => "8888888888",'maxlength' => true]) ?>

                        <?= $form->field($model, 'email')->textInput(['placeholder' => "mailname@mail.com",'maxlength' => true]) ?>

                        <?= $form->field($model, 'historydiseases')->textarea(['rows' => 2,'placeholder' => "เพื่อความปลอดภัยของคุณ โปรดระบุ",'maxlength' => true]) ?>


                        <?= $form->field($model, 'racetype_id')->dropdownList(
                            ArrayHelper::map(Racetype::find()->orderBy(['racename'=>SORT_ASC])->all(), 'id', 'racename'), [
                            'id' => 'ddl-racetype',
                            'prompt' => 'เลือกประเภทการวิ่ง'
                                ]
                        );
                        ?>

                        <?= $form->field($model, 'racecat_id')->widget(DepDrop::classname(), [
                               'options' => ['id' => 'ddl-cat'],
                               //'data' => [],
                               'data' => $racese,
                               'type' => DepDrop::TYPE_SELECT2,
                               'pluginOptions' => [
                                   'depends' => ['ddl-racetype'],
                                   'placeholder' => 'เลือกรุ่น',
                                   'url' => Url::to(['/register/get-race'])
                               ]
                           ]);
                        ?>
                       

                        <?=$form->field($model, 'shirt_id')->widget(Select2::classname(), [
                            'data' => ArrayHelper::map(Shirt::find()->all(), 'id', 'shirtname'),
                            'options' => ['placeholder' => 'เลือกเสื้อ/size'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                        ?>


                        <div class="form-group">
                            <?= Html::submitButton('<i class="fa fa-floppy-o"></i> ' . ($model->isNewRecord ? 'บันทึก' : 'แก้ไข'), ['class' => ($model->isNewRecord ? 'btn btn-success' : 'btn btn-default') . ' btn-lg btn-block']) ?>
                        </div>  
            <?php ActiveForm::end(); ?>    

                   </div> 
                </div>
        </div>           
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>