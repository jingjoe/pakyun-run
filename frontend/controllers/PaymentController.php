<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Payment;
use frontend\models\PaymentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use yii\db\Query;
use yii\data\ArrayDataProvider;


// Add upload
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Html;
use yii\helpers\Url;

// condatabase
use yii\db\Command;

/**
 * PaymentController implements the CRUD actions for Payment model.
 */
class PaymentController extends Controller
{
    /**
     * {@inheritdoc}
     * 
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Payment models.
     * @return mixed
     */
    public function actionIndex($search = NULL)
    {
        
        if (!empty($search)) {
            $se = $search;
        } else {
            $se = '';
        }
        $searchModel = new PaymentSearch();
        $searchModel2 = new \frontend\models\RegisterSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        
        $dataProvider2->query->andWhere(['status'=>1,'regis_id'=> $se]); //  ดึงเฉพาะที่ status = 1:สมัครแล้ว

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
        ]);
    }

    /**
     * Displays a single Payment model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
  
       public function actionView($id)
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 1) {
              return $this->redirect(['site/login']);
        }  
        
        if (!empty($id)) {
            $id = $id;
        } else {
             return $this->goHome();
             //return $this->redirect('index.php?r=payment');
        }
        
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Payment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($code = NULL)
    { 
        if (!empty($code)) {
            $cat_id = $code;
        } else {
            //return $this->goHome();
            return $this->redirect('index.php?r=payment');
        }
        
        $connection = Yii::$app->db;
        $model = new Payment();
        

            $model->token_upload = substr(Yii::$app->getSecurity()->generateRandomString(), 10);   
            $model->payment_date = date('Y-m-d'); 
        
            $model->regis_id = $cat_id; 
        if ($model->load(Yii::$app->request->post())) {
  
            $model->registration_ip = \Yii::$app->getRequest()->getUserIP(); // get ip address
            $model->create_date = date('Y-m-d H:i:s'); 
                //die(print_r($model->attributes));
                //$this->Uploads(false);
            
            $model->files = UploadedFile::getInstance($model, 'files');
            if ($model->files && $model->validate()) {
                $fileName = ($model->files->baseName .'_'. time()) . '.' . $model->files->extension;
                $image = $model->files;
                $model->files = $fileName;
                $image->saveAs('bill/' . $fileName);

                if ($model->save()) {
                    $st1 = $connection->createCommand("UPDATE payment SET confirm= 'N' WHERE regis_id='$cat_id'")->execute();
                    Yii::$app->session->setFlash('success', 'แจ้งการชำระเงินเรียบร้อยแล้ว !');
                    return $this->redirect('index.php?r=payment');

                }
                } else if ($model->save()) {
                    $st2 = $connection->createCommand("UPDATE payment SET confirm= 'N' WHERE regis_id='$cat_id'")->execute();
                    Yii::$app->session->setFlash('success', 'แจ้งการชำระเงินเรียบร้อยแล้ว !');
                    return $this->redirect('index.php?r=payment');

                }
        }
        
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Payment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionApprove()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 1) {
              return $this->redirect(['site/login']);
        }  
        $searchModel = new PaymentSearch();

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere(['confirm'=>'N']); //  ดึงเฉพาะที่ status = 1:สมัครแล้ว
		
		$dataProvider->sort->defaultOrder = [
                'create_date' => SORT_ASC,
        ];


        return $this->render('approve', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'model' => $model,
        ]);
    }
     
    public function actionConfirm($id , $code) {
        
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 1) {
              return $this->redirect(['site/login']);
        }  
        $user = Yii::$app->user->identity->username;
        $connection = Yii::$app->db;

        $model = Payment::find()->where(['id' => $id])->one();

        $d_regis = $connection->createCommand("UPDATE register SET status = '2' WHERE regis_id='$code'")->execute();
        $d_pay = $connection->createCommand("UPDATE payment SET confirm = 'Y' , user_conf='$user' WHERE id='$id'")->execute();
        
        Yii::$app->session->setFlash('success', 'ตรวจสอบถูกต้องแล้ว !');
        return $this->redirect(['payment/approve']);  
    }
    
    public function actionCheck() {
        
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 1) {
              return $this->redirect(['site/login']);
        }  
        
        $sql = "SELECT r.regis_id,r.fullname,IF(sex=1,'ชาย','หญิง') AS sex,r.birthday,
                r.age,r.bloodgroup,n.nationname,r.address,r.mobile,r.email,t.racename,
                c.racecatname,s.shirtname,st.statusname,r.create_date,DATEDIFF(NOW(),r.create_date) AS cc_day
                FROM register r
                LEFT JOIN nationality n ON n.id=r.nationality_id
                LEFT JOIN racetype t ON t.id=r.racetype_id
                LEFT JOIN racecat c ON c.id=r.racecat_id
                LEFT JOIN shirt s ON s.id=r.shirt_id
                LEFT JOIN `status` st ON st.id=r.`status`
                WHERE r.`status`='1' ";
        $data = Yii::$app->db->createCommand($sql)->queryAll();

        $dataProvider = new ArrayDataProvider([
            'allModels'=>$data,
//            'pagination'=>[
//            'pageSize'=>10 //แบ่งหน้า
//        ]
        ]);
        return $this->render('check', [
            'dataProvider' => $dataProvider,
            'excel' => $sql]);
    }
    


    protected function findModel($id)
    {
        if (($model = Payment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
