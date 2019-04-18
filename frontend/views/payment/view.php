<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Payment */

$this->title = 'หลักฐานการโอนเงิน/สลิป เลขที่ใบสมัคร'.' '.$model->regis_id;
//$this->params['breadcrumbs'][] = ['label' => 'Payments', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-view">
    <div class="row">
    <h1 class='text-center'><?= Html::encode($this->title) ?></h1>
   
  
    <?= DetailView::widget([
            'model' => $model,
            'bootstrap' => false,
            'labelColOptions' => ['hidden' => true],
            //'hAlign' => 'center',
            //'hover'=>true,
            'options' => ['align' => 'center'],
            'attributes' => [
                [  
                    //'attribute' => 'files',
                    'format' => 'raw',
                    'label' => '',
                    'value'=>$model->getPhotosViewer(),
                    //'format' => ['image',['width'=>'100','height'=>'100']],
                    'labelColOptions' => ['style' => 'width: 0%'],
                    //'valueColOptions' => ['style' => 'width:100%'],
                    //'displayOnly' => true,
                ],
        ],
    ]) ?>
    <br>
    <p class='text-center'> <?= Html::a('กลับไปหน้ายืนยันการชำระเงิน', ['payment/approve'], ['class' => 'btn btn-danger']) ?> </p>
  
</div>
  
</div>


