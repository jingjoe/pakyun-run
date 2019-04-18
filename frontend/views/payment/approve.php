<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\db\Query;
use yii\bootstrap\Modal;
use yii\helpers\Url;

use frontend\models\Payment;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PaymentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แจ้งชำระเงิน (Payment)';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-index">

  
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsiveWrap' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'regis_id',
                'format'=>'text', 
                'label' => 'เลขที่ใบสมัคร',
                'hAlign' => 'center',

            ],
            [
                'attribute' => 'personname',
                'format'=>'text', 
                'header' => 'ชื่อ-นามสกุล',
                //'hAlign' => 'left',
                'width' => '20%',  

            ],
            //'email',
			[
                'attribute'=>'payment_date',
                'value' => function ($model, $index, $widget) {
                    return Yii::$app->formatter->asDate($model->payment_date);
                },
                      
                'filterType' => GridView::FILTER_DATE,
                'filterWidgetOptions' => [
                    'language' => 'th',
                    //'type' => DatePicker::TYPE_COMPONENT_APPEND,
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'autoclose' => true,
                        'todayHighlight' => true,
                    ]
                ],
                'width' => '200px',
                'hAlign' => 'center',
            ],
            [
                'attribute' => 'payment_time',
                'format'=>'text', 
                'label' => 'เวลา',
                'hAlign' => 'center',

            ],
            [
                'attribute' => 'price',
                'format'=>['decimal', 0],
                'label' => 'จำนวนเงิน',
                'hAlign'=>'center',

            ],
            [
                'attribute' => 'create_date',
                'format'=>'text', 
                'label' => 'วันที่ส่งหลักฐาน',
                'hAlign' => 'center',
                'width' => '15%', 

            ],
            [ 
                'attribute' => 'files',
                'format'=>'html',
                 'label' => 'ไฟล์แนบ',
                'hAlign' => 'center',
                'value'=>function($model, $key, $index, $column){
                    return $model->files == NULL  ? "<i class=\"fa fa-times\">..ไม่มี</i>" : "<i class=\"fa fa-check\">..มี</i>";              
                }
   
            ],
//            [ 
//                'attribute' => 'confirm',
//                'format'=>'html',
//                'label' => 'สถานะ',
//                'hAlign' => 'center',
//                'value'=>function($model, $key, $index, $column){
//                    return $model->confirm == 'N'  ? "<i class=\"fa fa-times\">..ไม่ยืนยัน</i>" : "<i class=\"fa fa-check\">..ยืนยัน</i>";              
//                }
//   
//            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'header' => 'ดูเอกสาร',
                'template' => '{view}',
                'buttons' => [
                    'view' => function($url, $model, $key) {
                        return Html::a('<i class="fa fa-folder-open"></i>', ['payment/view', 'id' => $model->id], ['class' => ' btn btn-warning btn-sm']);
                    },
                    ]
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'header' => 'ยืนยัน',
                'template' => '{confirm}',
                'buttons' => [
                    'confirm' => function($url, $model, $key) {
                        return Html::a('<i class="fa fa-check"></i> ถูกต้องแล้ว', ['payment/confirm', 'id' => $model->id ,'code' => $model->regis_id], ['class' => 'btn btn-success btn-sm']);
                    },
                        ]
            ],

        ],
    ]); ?>

                    
<?php Pjax::end(); ?>
</div>

<?= \bluezed\scrollTop\ScrollTop::widget() ?>