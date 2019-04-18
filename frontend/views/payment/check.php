<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;

$this->title = 'ติดตาม/ค้างชำระ';
?>


      <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'rowOptions' => function ($model) {
                if ($model['cc_day'] >= 3) {
                    return ['class' => 'danger'];
                }
                    return ['class' => 'success'];
            }, 
            'headerRowOptions' => ['style' => 'background-color:#cccccc'],
            'responsiveWrap' => false,
            'panel' => [
                'type' => GridView::TYPE_DEFAULT,
                'heading' => '<h3 class="panel-title"><i class="fa fa-calendar-check-o"></i> ติดตาม/ค้างชำระ</h3>',
                'after' => 'วันที่ประมวลผล '.date('Y-m-d H:i:s').' น. <strong>หมายเหตุ !</strong> กำหนดจ่ายภายใน 3 วันหลังจากวันที่สมัคร  <span class="label label-danger"><i class="glyphicon glyphicon-remove"></i></span> เกินกำหนดจ่าย , <span class="label label-success"><i class="glyphicon glyphicon-ok"></i></span> ชำระเงินตามกำหนด',
                'footer'=>false
            ],
            'responsive' => true,
            'hover' => true,
            'exportConfig' => [
                   GridView::EXCEL=> ['label' => 'Export as EXCEL', 'filename' => 'paymentcheck_'.date('Y-d-m')],
                ],
        // set your toolbar
            'toolbar' =>  [
                ['content' => 
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['check'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('app', 'รีเซ็ต')])
                ],
                '{toggleData}',
                '{export}',
            ],
        // set export properties
            'export' => [
                'fontAwesome' => true
            ],
            'pjax' => true,
            'pjaxSettings' => [
                'neverTimeout' => true,
                'beforeGrid' => '',
                'afterGrid' => '',
            ],
            'columns' => [
                [
                    'class' => 'kartik\grid\SerialColumn'
                ],
                [
                    'attribute' => 'regis_id',
                    'header' => 'เลขที่ใบสมัคร', 
                ],
                [
                    'attribute' => 'fullname',
                    'header' => 'ชื่อ-นามสกุล',
                ],
                [
                    'attribute' => 'sex',
                    'header' => 'เพศ'
                ],
                [
                    'attribute' => 'birthday',
                    'header' => 'วันเกิด'
                ],
                [
                    'attribute' => 'age',
                    'header' => 'อายุ/ปี'
                ],
                [
                    'attribute' => 'bloodgroup',
                    'header' => 'กรุ๊ปเลือด'
                ],
                [
                    'attribute' => 'nationname',
                    'header' => 'สัญชาติ'
                ],
                [
                    'attribute' => 'address',
                    'header' => 'ที่อยู่',
                ],
                [
                    'attribute' => 'mobile',
                    'header' => 'เบอร์โทรศัพท์'
                ],
                [
                    'attribute' => 'email',
                    'header' => 'อีเมล'
                ],
                [
                    'attribute' => 'racename',
                    'header' => 'ประเภทการวิ่ง'
                ],
                [
                    'attribute' => 'racecatname',
                    'header' => 'รุ่นในการวิ่ง'
                ],
                [
                    'attribute' => 'shirtname',
                    'header' => 'เสื้อ/ไซส์'
                ],
                [
                    'attribute' => 'statusname',
                    'header' => 'สถานะ'
                ],
                [
                    'attribute' => 'create_date',
                    'header' => 'วันสมัคร'
                ],
                [
                    'attribute' => 'cc_day',
                    'header' => 'จำนวนวัน',
                    'hAlign'=>'center',
                    'contentOptions' => ['class'=>'text dabger'],
                ],
                [
                    'class' => 'kartik\grid\DataColumn',
                    'attribute'=>'',
                    'hAlign' => 'center',
                    'format' => 'raw',
                    'header' => 'PaymentStatus',
                    'value'=>function($model,$url){
                        if($model['cc_day'] >= 3)
                        {
                            return '<span style="color:red"><i class="glyphicon glyphicon-remove"></i>เกินกำหนดจ่าย </span>';
                        }
                        else
                        {
                           return '<span style="color:green"><i class="glyphicon glyphicon-ok"></i></span>';
                        }
                    }
                ],
            ]
        ]);
        ?>

<?= \bluezed\scrollTop\ScrollTop::widget() ?>