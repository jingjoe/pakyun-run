<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use kartik\nav\NavX;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
//use frontend\assets\AppAsset;
use frontend\assets\ThemesAsset;
use frontend\assets\DatatablesAsset;
use rmrevin\yii\fontawesome\FA;
use common\widgets\Alert;

//AppAsset::register($this);
ThemesAsset::register($this);
DatatablesAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    
    <head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Description" content="ปากพะยูน มินิมาราธอนและฟันรัน ครั้งที่ 2 ประจำปี 2562 [Pakphayun  Mini Marathon & Fun Run 2nd 2019]">
    <meta name="KeyWords" content="Mini Marathon & Fun Run">
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/images/running.ico" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'PAKYUN RUN<i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>62',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default', //navbar-fixed-top,navbar-default
        ],
    ]);
    
 $username = '';
            if (!Yii::$app->user->isGuest) {
                $username = ' [' . Html::encode(Yii::$app->user->identity->username) . ']';
            }
            if (Yii::$app->user->isGuest) {
                $submenuItems[] = ['label' => FA::icon('sign-in', ['class' => 'text-secondary']) .' เข้าสู่ระบบ', 'url' => ['/site/login']];
                //$submenuItems[] = ['label' => '<span class="glyphicon glyphicon-globe"></span> ลงทะเบียนผู้ใช้งาน', 'url' => ['/site/signup']];
            } else {
                $submenuItems[] = ['label' => FA::icon('user-secret', ['class' => 'text-secondary']) .' ลงทะเบียน Admin', 'url' => ['/site/signup'],'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->username == admin];
                $submenuItems[] = [
                    'label' => FA::icon('sign-out', ['class' => 'text-secondary']) .' ออกจากระบบ',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }

            $risk_mnu_itms[] = ['label' => '<span class="glyphicon glyphicon-floppy-saved"></span> รายงานความเสี่ยง', 'url' => ['risk/index']];
       


            if (!Yii::$app->user->isGuest && Yii::$app->user->identity->role != 99) {
                $adminitems[] =  ['label' => FA::icon('search') . ' สืบค้นทะเบียนนักวิ่ง', 'url' => ['/register/search']];
                $adminitems[] =  ['label' => FA::icon('money') . ' ติดตาม/ค้างชำระ', 'url' => ['/payment/check']];
                $adminitems[] =  ['label' => FA::icon('thumbs-o-up') . ' ยืนยันการชำระเงิน', 'url' => ['/payment/approve']];
                $adminitems[] =  ['label' => FA::icon('cart-arrow-down') . ' จ่ายเสื้อ/BIB', 'url' => ['/payshirt']];
                $adminitems[] =  ['label' => FA::icon('line-chart') . ' สถิติการลงทะเบียน', 'url' => ['/stat']];

            }

            $menuItems = [
                    ['label' => FA::icon('user-plus', ['class' => 'text-primary']) . ' ลงทะเบียน', 'url' => ['/register']],
                    ['label' => FA::icon('credit-card', ['class' => 'text-danger']) . ' แจ้งชำระเงิน', 'url' => ['/payment']],
                    ['label' => FA::icon('check-square', ['class' => 'text-success']) . ' ตรวจสอบสถานะ', 'url' => ['/register/status']],
                    ['label' => FA::icon('university', ['class' => 'text-info']) . ' ที่พัก', 'url' => ['/site/rest'],'visible' => Yii::$app->user->isGuest],
                    ['label' => FA::icon('phone-square' ,['class' => 'text-warning']) . ' ติดต่อสอบถาม', 'url' => ['/site/contact'],'visible' => Yii::$app->user->isGuest],
                    ['label' => FA::icon('cog' ,['class' => 'text-warning']) . ' จัดการระบบ', 'items' => $adminitems,'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->role != 99],
                    ['label' => FA::icon('power-off', ['class' => 'text-secondary']) .' ผู้ดูแลระบบ' . $username, 'items' => $submenuItems],
            ];
   
         echo NavX::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => $menuItems,
            ]);
            NavBar::end();
            ?>
     <div class="container">
        <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],]) ?>
        <?=\yii2mod\alert\Alert::widget()?>
        <?= $content ?>
    </div>

</div>

<div class="footer">
    <div class="container">
        <p style="text-align:center;">Copyright &copy; <?= date('Y') ?> <a href="#">อำเภอปากพะยูน.</a> Developed By <a href="#">วิเชียร นุ่นศรี</a></p>
    <?php
        $ver = file_get_contents(Yii::getAlias('@webroot/version/version.txt'));
        $ver = explode(',', $ver);
    ?>
    <?php $visit = Yii::$app->db->createCommand("SELECT COUNT(id) FROM session_frontend_user")->queryScalar(); ?>
        <h6><p style="text-align:center;">เวอร์ชั่น <i class="fa fa-globe"></i> <?= $ver[0] ?>  |  ผู้เยี่ยมชม <i class="fa fa-street-view"></i> <?= $visit;?> ครั้ง </p></h6>
    </div>
</div>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<style>
    ul,li,p,a,h1,h2,h3,h4,h5,h6,
    a.btn,button.btn,span,th,td,
    div,select{
       font-family: 'Prompt', sans-serif;
    }

</style>
