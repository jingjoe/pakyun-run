<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\helpers\Url;

use yii\bootstrap\ActiveForm;

?>

<div class='box-tools text-center'>
    <?php
    $form = ActiveForm::begin([
                'layout' => 'inline',
                'action' => ['status'],
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

<div class="register-view">
    <div class="text-center">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_status',
            'summary'=>''
        ]); ?>
    </div>


</div>

