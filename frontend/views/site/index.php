<?php
use yii\helpers\Html;
use aneeshikmat\yii2\Yii2TimerCountDown\Yii2TimerCountDown;

/* @var $this yii\web\View */

$this->title = 'ปากพะยูน มินิมาราธอนและฟันรัน ครั้งที่ 2 ประจำปี 2562 (Pakphayun Mini Marathon & FunRun 2nd 2019)';
?>

<?php
  $callBackScript = <<<JS
            alert('หมดเวลารับสมัครแล้วคะ !');
JS;
?>
<div class="site-index">
<!-- countdows    -->
    <div class="jumbotron-bg">
            <?php echo Html::img('images/logo.png', ['class' => 'img-responsive center-block']); ?>         
            <p class='text-center'>   
                <?= Html::a('<i class="fa fa-user-plus"></i> ลงทะเบียน', ['/register'], ['class' => 'btn btn-danger']) ?>
                <?= Html::a('<i class="fa fa-credit-card"></i> แจ้งชำระเงิน', ['/payment'], ['class' => 'btn btn-warning']) ?>
            </p> 

                <?php
                $date1 = date('Y-m-d H:i:s', strtotime("now"));
                $date2 = date('Y-m-d H:i:s', strtotime("2019-07-06 23:00:00"));
                $cc = (strtotime($date2) - strtotime($date1)) / ( 60 * 60 * 24 );  // 1 day = 60*60*24
                //$date= date('Y-m-d',strtotime("+10 week"));
                //$date= date('Y-m-d',strtotime("+10 week 2 days 1 hours 1 seconds"));
                $date = date("Y-m-d H:i:s", mktime(date("H"), date("i") + 0, date("s") + 0, date("m") + 0, date("d") + $cc, date("Y") + 0));
                ?>    
                <h8>นับถอยหลัง วัน:ชั่วโมง:นาที:วินาที</h8>
		<div style="font-size:20px" id="time-down-counter-2"></div>
                <?=
                Yii2TimerCountDown::widget([
                    'countDownIdSelector' => 'time-down-counter-2',
                    'countDownDate' => strtotime($date) * 1000, // You most * 1000 to convert time to milisecond
                    'countDownResSperator' => ' ',
                    'addSpanForResult' => true,
                    'addSpanForEachNum' => false,
                    'countDownOver' => 'Expired',
                    'countDownReturnData' => 'from-days',
                    'templateStyle' => 0,
                    'getTemplateResult' => 0,
                    'callBack' => $callBackScript
                ])
                ?>
           
		<h2>PAKPHAYUN  MINI MARATHON & FUN RUN 2nd 2019</h2>
        <h3>ปากพะยูน มินิมาราธอนและฟันรัน ครั้งที่ 2 ประจำปี 2562</h3>
        <p class="lead"><i class="fa fa-quote-left"></i> โครงการปากพะยูนสามัคคี เราไม่ทิ้งกัน <i class="fa fa-quote-right"></i></p>
		<h5><font color="#ffff00">START 7 JULY 2019</font></h5> 		
    </div>

<!-- decription    -->
    <div class="panel panel-info"> 
        <div class="panel-heading"></div>
        <div class="panel-body"> 
                <?php echo Html::img('images/bg.png', ['class' => 'img-responsive']); ?>
        </div>
    </div>   
<!-- maprun    -->
    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-info"> 
            <div class="panel-heading"></div>
                <div class="panel-body">             

                <div class="col-sm-6">
                    <div class="panel panel-default"> 
                        <div class="panel-heading"> <h3 class="panel-title  text-center">รายละเอียดการแข่งขัน</h3></div>
                    <div class="panel-body">   
                        <?php echo Html::img('images/description.png', ['class' => 'img-responsive']); ?>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default"> 
                        <div class="panel-heading"> <h3 class="panel-title  text-center">เส้นทางวิ่ง</h3></div>
                        <div class="panel-body">   
                            <?php echo Html::img('images/maprunning.png', ['class' => 'img-responsive']); ?>              
                        </div>
                    </div>
                </div>
                    </div>
            </div>
        </div>
    </div>

<!-- description    -->
    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-info"> 
            <div class="panel-heading"></div>
                <div class="panel-body">            
                <?php echo Html::img('images/poster.png', ['class' => 'img-responsive']); ?>    
                </div>
            </div>
        </div>
    </div>
<!-- report    -->
    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-info"> 
            <div class="panel-heading"></div>
                <div class="panel-body">             

                <div class="col-sm-6">
                    <div class="panel panel-default"> 
                        <div class="panel-heading"> <h3 class="panel-title  text-center">ประเภทมินิมาราธอน 10.5 กม. จำนวน <?= $total1 ?> คน</h3></div>
                    <div class="panel-body">   
                           <div class="pull-left col-sm-6">
                                   <ul class="list-group">
                                       <li class="list-group-item active text-center"><i class="fa fa-child" aria-hidden="true"></i> เพศชาย <?= $total_m1 ?> คน</li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> อายุไม่เกิน 18 ปี <span class="badge"> <?= $mm1 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> ทั่วไปไม่จำกัดอายุ <span class="badge"> <?= $mm2 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> อายุ 30-34 ปี <span class="badge"> <?= $mm3 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> อายุ 35-39 ปี <span class="badge"> <?= $mm4 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> อายุ 40-44 ปี <span class="badge"> <?= $mm5 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> อายุ 45-49 ปี <span class="badge"> <?= $mm6 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> อายุ 50-54 ปี <span class="badge"> <?= $mm7 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> อายุ 55-59 ปี <span class="badge"> <?= $mm8 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> อายุ 60 ปีขึ้นไป <span class="badge"> <?= $mm9 ?> </span></li>
                                   </ul>
                            </div>

                            <div class="pull-right col-sm-6">
                                   <ul class="list-group">
                                       <li class="list-group-item active text-center"><i class="fa fa-female" aria-hidden="true"></i> เพศหญิง <?= $total_f1 ?> คน </li>
                                       <li class="list-group-item"><i class="fa fa-female" aria-hidden="true"></i> อายุไม่เกิน 18 ปี <span class="badge"> <?= $mm10 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-female" aria-hidden="true"></i> ทั่วไปไม่จำกัดอายุ <span class="badge"> <?= $mm11 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-female" aria-hidden="true"></i> อายุ 30-39 ปี <span class="badge"> <?= $mm12 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-female" aria-hidden="true"></i> อายุ 40-49 ปี <span class="badge"> <?= $mm13 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-female" aria-hidden="true"></i> อายุ 50-59 ปี <span class="badge"> <?= $mm14 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-female" aria-hidden="true"></i> อายุ 60 ปีขึ้นไป <span class="badge"> <?= $mm15 ?> </span></li>
                                   </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default"> 
                        <div class="panel-heading"> <h3 class="panel-title  text-center">ประเภทฟันรัน 4.5 กม. จำนวน <?= $total2 ?> คน</h3></div>
                        <div class="panel-body">   
                           <div class="pull-left col-sm-6">
                                   <ul class="list-group">
                                       <li class="list-group-item active text-center"><i class="fa fa-child" aria-hidden="true"></i> เพศชาย <?= $total_m2 ?> คน</li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> อายุไม่เกิน 15 ปี <span class="badge"> <?= $fm1 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> ทั่วไปไม่จำกัดอายุ <span class="badge"> <?= $fm2 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> อายุ 45-54 ปี <span class="badge"> <?= $fm3 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> อายุ 55-64 ปี <span class="badge"> <?= $fm4 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-child" aria-hidden="true"></i> อายุ 65 ปีขึ้นไป <span class="badge"> <?= $fm5 ?> </span></li>
                                   </ul>
                            </div>

                            <div class="pull-right col-sm-6">
                                   <ul class="list-group">
                                       <li class="list-group-item active text-center"><i class="fa fa-female" aria-hidden="true"></i> เพศหญิง <?= $total_f2 ?> คน </li>
                                       <li class="list-group-item"><i class="fa fa-female" aria-hidden="true"></i> อายุไม่เกิน 15 ปี <span class="badge"> <?= $fm6 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-female" aria-hidden="true"></i> ทั่วไปไม่จำกัดอายุ <span class="badge"> <?= $fm7 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-female" aria-hidden="true"></i> อายุ 45-54 ปี <span class="badge"> <?= $fm8 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-female" aria-hidden="true"></i> อายุ 55-64 ปี <span class="badge"> <?= $fm9 ?> </span></li>
                                       <li class="list-group-item"><i class="fa fa-female" aria-hidden="true"></i> อายุ 65 ปีขึ้นไป <span class="badge"> <?= $fm10 ?> </span></li>
                                   </ul>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<?= \bluezed\scrollTop\ScrollTop::widget() ?>