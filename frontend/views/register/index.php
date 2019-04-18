<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MedicalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'สืบค้นทะเบียนนักวิ่ง Race Search';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-search">

<?php Pjax::begin(); ?>         
    <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'headerRowOptions' => ['style' => 'background-color:#cccccc'],
            'panel' => [
                'type' => GridView::TYPE_DEFAULT,
				'heading' => '<h3 class="panel-title"><i class="fa fa-search"></i> สืบค้นทะเบียนนักวิ่ง</h3>',
                'after' => 'วันที่ประมวลผล '.date('Y-m-d H:i:s').' น. <strong>หมายเหตุ !</strong> <span class="label label-success"><i class="glyphicon glyphicon-ok"></i></span> ชำระเงินแล้ว   ,  <span class="label label-warning"><i class="glyphicon glyphicon-remove"></i></span> ไม่ได้ชำระเงิน',
                //'footer'=>true
            ],
            'responsive' => true,
            'hover' => true,
            'pager' => [
                    'options'=>['class'=>'pagination'],   // set clas name used in ui list of pagination
                    'prevPageLabel' => 'ก่อนหน้า',   // Set the label for the "previous" page button
                    'nextPageLabel' => 'ถัดไป',   // Set the label for the "next" page button
                    'firstPageLabel'=>'เริ่มต้น',   // Set the label for the "first" page button
                    'lastPageLabel'=>'สุดท้าย',    // Set the label for the "last" page button
                    'nextPageCssClass'=>'ถัดไป',    // Set CSS class for the "next" page button
                    'prevPageCssClass'=>'ก่อนหน้า',    // Set CSS class for the "previous" page button
                    'firstPageCssClass'=>'เริ่มต้น',    // Set CSS class for the "first" page button
                    'lastPageCssClass'=>'สุดท้าย',    // Set CSS class for the "last" page button
                    'maxButtonCount'=>20,    // Set maximum number of page buttons that can be displayed
            ], 
            'exportConfig' => [
                   GridView::EXCEL=> ['label' => 'Export as EXCEL', 'filename' => 'registersearch_'.date('Y-d-m')],

                ],
        // set your toolbar
            'toolbar' =>  [
                ['content' => 
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['register/search'], ['data-pjax' => 0, 'class' => 'btn btn-default', 'title' => Yii::t('app', 'รีเซ็ต')])
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
            'rowOptions' => function($model){
                if($model['status'] == 1){
                    return ['style'=>'background-color: #f9c925'];
                }else{
                    return ['style'=>'background-color: #25c50f'];
                }
            },    
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
			[
                'attribute' => 'create_date',
                'label' => 'วันที่สมัคร',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'regis_id',
                'label' => 'เลขที่ใบสมัคร',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'fullname',
                'label' => 'ชื่อ-นามสกุล',
                'headerOptions' => ['class' => 'text-center'],
                //'width' => '5%',
            ],
            [
                'attribute' => 'birthday',
                'label' => 'วันเกิด',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'sex',
                'label' => 'เพศ',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'age',
                'label' => 'อายุ/ปี',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'nationname',
                'label' => 'สัญชาติ',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'team',
                'label' => 'สังกัดทีม-ชมรม',
                'headerOptions' => ['class' => 'text-center'],
            ],           
            [
                'attribute' => 'address',
                'label' => 'ที่อยู่',
                'contentOptions' => [
                    'style'=>'max-width:2000px; overflow: auto; white-space: normal; word-wrap: break-word;'
                ],
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'mobile',
                'label' => 'เบอร์โทรศัพท์',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ], 
            [
                'attribute' => 'email',
                'label' => 'อีเมล',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'bloodgroup',
                'label' => 'กรุ๊ปเลือด',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'historydiseases',
                'label' => 'ประวัติโรคประจำตัว',
                'headerOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'racetypename',
                'label' => 'ประเภทการวิ่ง',
                'headerOptions' => ['class' => 'text-center'],
            ], 
            [
                'attribute' => 'racecatname',
                'label' => 'รุ่นในการวิ่ง',
                'headerOptions' => ['class' => 'text-center'],
            ], 
            [
                'attribute' => 'shirename',
                'label' => 'เสื้อ/size',
                'headerOptions' => ['class' => 'text-center'],
            ], 
            [
                'attribute' => 'stname',
                'label' => 'สถานะ',
                'contentOptions' => ['class' => 'text-center'],
                'headerOptions' => ['class' => 'text-center'],
            ]      

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>

<?= \bluezed\scrollTop\ScrollTop::widget() ?>