<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


use frontend\models\Register;

/* @var $this yii\web\View */
/* @var $model frontend\models\Register */

$this->title = 'ตรวจสอบสถานะของเลขที่ใบสมัคร  '. $model->regis_id;
//$this->params['breadcrumbs'][] = ['label' => 'Registers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-status">

    <div class="col-md-6 col-md-offset-3">
            <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
            [
                'attribute'=>'เลขที่ใบสมัคร',
                'value'=>$model->regis_id,
            ],
            [
                'attribute'=>'ชื่อ-นามสกุล',
                'value'=>$model->fullname,
            ],
            [
                'attribute'=>'ประเภทการวิ่ง',
                'value'=>$model->racetypename,
            ],
            [
                'attribute'=>'รุ่นในการวิ่ง',
                'value'=>$model->racecatname,
            ],
            [
                'attribute'=>'เสื้อ/size',
                'value'=>$model->shirename,
            ],
            [
                'format'=>'html',
                'label' => 'สถานะ',
                'value' => '<span style="color:red;">'.$model->stname.'</span>'
            ],
            [
                'attribute'=>'วันที่สมัคร',
                'value'=>$model->create_date,
            ],
            ],
        ]) ?>

      </div> 
</div>
