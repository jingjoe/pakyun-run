<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Register */

$this->title = 'ลงทะเบียน (Register)';
//$this->params['breadcrumbs'][] = ['label' => 'Registers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
