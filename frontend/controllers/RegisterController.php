<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Register;
use frontend\models\RegisterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use \yii\data\ActiveDataProvider;
use \yii\db\Query;


//  dropdownlist
use frontend\models\Racetype;
use frontend\models\Racecat;

// DepDrop Select2
use yii\helpers\Json;



/**
 * RegisterController implements the CRUD actions for Register model.
 */
class RegisterController extends Controller
{
    /**
     * {@inheritdoc}
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

    public function actionIndex()
    {
        $model = new Register();
        
        $code = 'PY'.date('His'); // gen regiscode
        
        $model->regis_id = $code;
        $model->registration_ip = \Yii::$app->getRequest()->getUserIP(); // get ip address
        $model->create_date = date('Y-m-d H:i:s'); 
        
        $model->sex = 1; 
        $model->bloodgroup = 'N';
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'ลงทะเบียนเรียบร้อยแล้ว ! เลขที่ใบสมัครของคุณคือ '.' '.$code);
                return $this->redirect('index.php?r=register/index');
        } else {
            return $this->render('create', [
                'model' => $model,
                'racese' =>[],
            ]);
        }
    }  
    /*
    //ปิดระบบส่งอีเมลล์ยืนยันการสมัครสมาชิก
    public function actionIndex()
    {
        $model = new Register();
        
        $code = 'PY'.date('His'); // gen regiscode
        
        $model->regis_id = $code;
        $model->registration_ip = \Yii::$app->getRequest()->getUserIP(); // get ip address
        $model->create_date = date('Y-m-d H:i:s'); 
        
        //if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if ($model->load(Yii::$app->request->post()) ) {
                
                 if (! empty($model->email)) {
                //ส่งอีเมลล์ยืนยันการสมัครสมาชิก
                    Yii::$app->mailer->compose('@app/mail/layouts/welcome',['fullname'=>$model->fullname,'codeid'=>$model->regis_id])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ''])
                    ->setTo($model->email)
                    ->setSubject('ยินดีต้อนรับสู่ ' . \Yii::$app->name)
                    //->attach(Yii::getAlias('@webroot').'/attach/'.'pakphayun_marathon.pdf') //แนบเอกสารส่งเมล์
                    ->send();  
                    
                    $model->save();
                        Yii::$app->session->setFlash('success', 'ลงทะเบียนเรียบร้อยแล้ว ! เลขที่ใบสมัครของคุณคือ '.' '.$code);
                        return $this->redirect('index.php?r=register');
                     
                 }else {
                    $model->save();
                        Yii::$app->session->setFlash('success', 'ลงทะเบียนเรียบร้อยแล้ว ! เลขที่ใบสมัครของคุณคือ '.' '.$code);
                            return $this->redirect('index.php?r=register');
                }
        }
            
                $model->sex = 1; 
                $model->bloodgroup = 'N';
                
        return $this->render('create', [
            'model' => $model,
              'racese' =>[],
        ]);
    }
    */
       
 // function ดึงชื่อความเสี่ยง DepDrop 2 ตัวเลือก
    public function actionGetRace() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $racetype_id = $parents[0];
                $out = $this->getRace($racetype_id );
                //echo Json::encode(['output' => $out, 'selected' => '']);
				\Yii::$app->response->data = Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
				//echo Json::encode(['output' => '', 'selected' => '']);
				\Yii::$app->response->data = Json::encode(['output'=>$out, 'selected'=>'']);
    }
    
    protected function GetRace($id) {
        $datas = Racecat::find()->where(['racetype_id' => $id])->all();  //ดึง ID ประเภทการแข่งขัน
        //return $this->MapData1($datas, 'racetype_id', 'racecatname');
        return $this->MapData1($datas, 'id', 'racecatname');
    }
    

    protected function MapData1($datas, $fieldId, $fieldName) {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }
        return $obj;
    }
    
    
    public function actionStatus($search = NULL)
    {   
        
        if (!empty($search)) {
            $se = $search;
        } else {
            $se = '';
        }
        
    $model = new Register();
    $searchModel = new RegisterSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
    $dataProvider = new ActiveDataProvider([
    'query' => Register::find()->where(['=', 'regis_id', $se]),
    'pagination' => false,
    ]);

    return $this->render('view', [
        'dataProvider' => $dataProvider,
        'searchModel' => $searchModel,
        'model' => $model,
    ]);
    }
	
    public function actionSearch()
    {
        if (Yii::$app->user->isGuest || Yii::$app->user->identity->role !== 1) {
              return $this->redirect(['site/login']);
        } 
        
        $searchModel = new RegisterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$dataProvider->sort->defaultOrder = [
                'create_date' => SORT_ASC,
        ];
          
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Register::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
