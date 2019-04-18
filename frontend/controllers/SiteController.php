<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

use dosamigos\google\maps\LatLng;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()

    {
        //ประเภท มินิมาราธอน ทั้งหมด
        $m = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE  racetype_id=1 AND `status`=2")->queryOne();
        $t1 =  $m['cc'];
        
        //ประเภท มินิมาราธอน  ชาย-หญิง
        $sql_m1 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=1 AND `status`=2")->queryOne();
        $t_m1 =  $sql_m1['cc'];
        
        $sql_f1 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=1 AND `status`=2")->queryOne();
        $t_f1 =  $sql_f1['cc'];
        
       //ประเภท มินิมาราธอน  ชาย ตามชั่วงอายุ
        $s1 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=1  AND racecat_id=1 AND `status`=2")->queryOne();
        $mm1 =  $s1['cc'];
        
        $s2 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=1  AND racecat_id=2 AND `status`=2")->queryOne();
        $mm2 =  $s2['cc'];
        
        $s3 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=1  AND racecat_id=3 AND `status`=2")->queryOne();
        $mm3 =  $s3['cc'];
        
        $s4 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=1  AND racecat_id=4 AND `status`=2")->queryOne();
        $mm4 =  $s4['cc'];
        
        $s5 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=1  AND racecat_id=5 AND `status`=2")->queryOne();
        $mm5 =  $s5['cc'];
        
        $s6 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=1  AND racecat_id=6 AND `status`=2")->queryOne();
        $mm6 =  $s6['cc'];
        
        $s7 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=1  AND racecat_id=7 AND `status`=2")->queryOne();
        $mm7 =  $s7['cc'];
        
        $s8 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=1  AND racecat_id=8 AND `status`=2")->queryOne();
        $mm8 =  $s8['cc'];
        
        $s9 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=1  AND racecat_id=9 AND `status`=2")->queryOne();
        $mm9 =  $s9['cc'];
       
        //ประเภท มินิมาราธอน  หญิง ตามชั่วงอายุ
        
        $s10 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=1  AND racecat_id=10 AND `status`=2")->queryOne();
        $mm10 =  $s10['cc'];
        
        $s11 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=1  AND racecat_id=11 AND `status`=2")->queryOne();
        $mm11 =  $s11['cc'];
        
        $s12 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=1  AND racecat_id=12 AND `status`=2")->queryOne();
        $mm12 =  $s12['cc'];
        
        $s13 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=1  AND racecat_id=13 AND `status`=2")->queryOne();
        $mm13 =  $s13['cc'];
        
        $s14 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=1  AND racecat_id=14 AND `status`=2")->queryOne();
        $mm14 =  $s14['cc'];
       
        $s15 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=1  AND racecat_id=15 AND `status`=2")->queryOne();
        $mm15 =  $s15['cc'];
       
       
        //ประเภท ฟันรัน ทั้งหมด
        $f = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE racetype_id=2 AND `status`=2 ")->queryOne();
        $t2 =  $f['cc'];
        
        //ประเภท ฟันรัน  ชาย-หญิง
        $sql_m2 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=2 AND `status`=2")->queryOne();
        $t_m2 =  $sql_m2['cc'];
        
        $sql_f2 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=2 AND `status`=2")->queryOne();
        $t_f2 =  $sql_f2['cc'];
        
        //ประเภท ฟันรัน  ชาย ตามชั่วงอายุ
        $s1 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=2  AND racecat_id=16 AND `status`=2")->queryOne();
        $fm1 =  $s1['cc'];
        
        $s2 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=2  AND racecat_id=17 AND `status`=2")->queryOne();
        $fm2 =  $s2['cc'];
        
        $s3 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=2  AND racecat_id=18 AND `status`=2")->queryOne();
        $fm3 =  $s3['cc'];
        
        $s4 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=2  AND racecat_id=19 AND `status`=2")->queryOne();
        $fm4 =  $s4['cc'];    
        
        $s5 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=1 AND racetype_id=2  AND racecat_id=20 AND `status`=2")->queryOne();
        $fm5 =  $s5['cc'];
        
        
        //ประเภท ฟันรัน  หญิง ตามชั่วงอายุ
        
        $s6 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=2  AND racecat_id=21 AND `status`=2")->queryOne();
        $fm6 =  $s6['cc'];
        
        $s7 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=2  AND racecat_id=22 AND `status`=2")->queryOne();
        $fm7 =  $s7['cc'];
        
        $s8 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=2  AND racecat_id=23 AND `status`=2")->queryOne();
        $fm8 =  $s8['cc'];
        
        $s9 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=2  AND racecat_id=24 AND `status`=2")->queryOne();
        $fm9 =  $s9['cc'];
        
        $s10 = Yii::$app->db->createCommand("SELECT COUNT(regis_id) AS cc FROM register WHERE sex=2 AND racetype_id=2  AND racecat_id=25 AND `status`=2")->queryOne();
        $fm10 =  $s10['cc'];
                
        return $this->render('index',[
            'total1' => $t1,
            'total2' => $t2,
            'total_m1' => $t_m1,
            'total_f1' => $t_f1,
            'total_m2' => $t_m2,
            'total_f2' => $t_f2,
            'mm1' => $mm1,
            'mm2' => $mm2,
            'mm3' => $mm3,
            'mm4' => $mm4,
            'mm5' => $mm5,
            'mm6' => $mm6,
            'mm7' => $mm7,
            'mm8' => $mm8,
            'mm9' => $mm9,
            'mm10' => $mm10,
            'mm11' => $mm11,
            'mm12' => $mm12,
            'mm13' => $mm13,
            'mm14' => $mm14, 
            'mm15' => $mm15,  
            'fm1' => $fm1,
            'fm2' => $fm2,
            'fm3' => $fm3,
            'fm4' => $fm4,
            'fm5' => $fm5,
            'fm6' => $fm6,
            'fm7' => $fm7,
            'fm8' => $fm8,
            'fm9' => $fm9,
            'fm10' => $fm10,
            ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $username = $model->username;
            $ip = \Yii::$app->getRequest()->getUserIP();

            $sql = " INSERT INTO `user_log` (`username`,`login_date`, `ip`) VALUES ('$username',NOW(), '$ip') ";
            \Yii::$app->db->createCommand($sql)->execute();
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
  /*  
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
*/
       public function actionContact()
    {
        return $this->render('contact');
    }
    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionRest()
    {
        return $this->render('rest');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
