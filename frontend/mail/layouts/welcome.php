<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<p style="text-align:center; "><b><font size="32">สวัสดีคุณ  <?php echo $fullname; ?> </font></b></p>
<h1><p style="text-align:center; ">เลขที่ใบสมัครของคุณคือ <font color="red"> <?php echo $codeid; ?> </font></p></h1>
<h3><p style="text-align:center; color: blue;">ตอนนี้คุณได้ทำการลงทะเบียนวิ่ง เรีบยร้อยแล้ว ! </p></h3>
<h2><p style="text-align:center; color: pink; ">ขอบคุณที่ร่วมกิจกรรมกับเรา "ปากพะยูน มินิมาราธอนและฟันรัน ครั้งที่ 2 ประจำปี 2562"</p></h2>
<p style="text-align:center;">สามารถดูรายละเอียดและกำหนดการต่างๆ  <a href="http://url.ie/13sp8">ได้ที่นี่</a> </p>
<hr>
<h1><p style="text-align:center; color: green; ">แจ้งชำระเงิน</p></h1>
<p style="text-align:center;">http://61.7.219.187/pakyun-run/frontend/web/index.php?r=payment%2Findex&search=<?php echo $codeid; ?></p>
<hr>
<h1><p style="text-align:center; color: green; ">ตรวจสอบสถานะ</p></h1>
<p style="text-align:center;">http://61.7.219.187/pakyun-run/frontend/web/index.php?r=register%2Fstatus&search=<?php echo $codeid; ?></p>


