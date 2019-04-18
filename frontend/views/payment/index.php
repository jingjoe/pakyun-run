<?php

use yii\helpers\Html;
use kartik\grid\GridView;
//use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ค้นหาเลขที่ใบสมัคร แจ้งชำระเงิน';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">
<div class="jumbotron">
  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class='box-tools text-center'>
        <?php
        $form = ActiveForm::begin([
                    'layout' => 'inline',
                    'action' => ['index'],
                    'method' => 'get',
        ]);
        ?>

        <!-- <label class="control-label">ค้นหาเลขที่ใบสมัคร</label>-->
        <div class="input-group">
            <input type="text" name="search" id="search" class="form-control input-lg" placeholder="ระบุ..เลขที่ใบสมัคร">
            <span class="input-group-btn">
                <button class="btn btn-info input-lg" type="submit">ค้นหา<i class="fa fa-fw fa-search"></i></button>
            </span>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
<br>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        //'filterModel' => $searchModel2,
        //'responsiveWrap' => false,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
                [
                    'header' => 'เลขที่ใบสมัคร',
                    'attribute' => 'regis_id'
                ],
                [
                    'header' => 'ชื่อ-นามสกุล',
                    'attribute' => 'fullname'
                ],
                [
                    'header' => 'วันที่สมัคร',
                    'attribute' => 'create_date'
                ],
                [
                    'header' => 'ประเภทการวิ่ง',
                    'attribute' => 'racetypename'
                ],
                [
                    'header' => 'รุ่นในการวิ่ง',
                    'attribute' => 'racecatname'
                ],
                [
                    'header' => 'เสื้อ/Size',
                    'attribute' => 'shirename'
                ],

                [
                    'class' => 'kartik\grid\ActionColumn',
                    'header' => 'แจ้งชำระเงิน', 
                    'template'=>'{update}',
                    'buttons'=>[
                        'update'=>function($url,$model,$key){                        
                            return  Html::a('<i class="fa fa-btc"></i> แจ้งชำระเงิน', ['payment/create', 'code' => $model->regis_id], ['class' => 'btn btn-warning btn-xs']);
                        },
                      ]
                ],
        ],
    ]); ?>
   <?php Pjax::end(); ?>

</div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>