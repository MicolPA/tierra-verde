<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Clients;
use frontend\models\TouristPackages;
use frontend\models\TouristPackagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * TouristPackagesController implements the CRUD actions for TouristPackages model.
 */
class TouristPackagesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        $this->layout = 'admin-menu';
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TouristPackages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'main';
        $searchModel = new TouristPackagesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionList()
    {
        $searchModel = new TouristPackagesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index-admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TouristPackages model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'main';

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionBook(){

        $this->layout = 'main';
        $post = $this->request->post();
        $model = new Clients();
        

        if ($post) {
            $model->package_id = $post['package'];
            $price = $post['adults_amount'] + $post['children_amount'];

            if (isset(Yii::$app->user->identity->id)) {
                $model->first_name = Yii::$app->user->identity->first_name;
                $model->last_name = Yii::$app->user->identity->last_name;
                $model->email = Yii::$app->user->identity->email;
            }else{
                return $this->redirect(['/site/login', 'url' => "/tourist-packages/view?id=".$post['package']]);
            }

            return $this->render('book', [
                'post' => $post,
                'model' => $model,
                'price' => $price,
            ]);

        }

        
    }



    function actionSaveTransaction(){

        $get = Yii::$app->request->get();
        $payer = $get['payer'];

        $model = new \frontend\models\TransactionDetails();

        $model->payer_first_name = $payer['name']['given_name'];
        $model->payer_last_name = $payer['name']['surname'];
        $model->payer_id = $payer['payer_id'];
        $model->payer_email = $payer['email_address'];
        $model->country_code = $payer['address']['country_code'];

        //Id de la transaccion
        $model->invoice_number = $get['data']['purchase_units'][0]['payments']['captures'][0]['id'];
        // $model->amount = $get['data']['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
        // $model->amount = $data['transactions']['amount']['total'];

        $model->package_id = $get['package_id'];
        // $model->client_id = $get['client_id'];
        $model->client_id = 1;
        $model->state = $get['data']['status'];
        $model->date = date("Y-m-d H:i:s");

        // $model->pagado = $data['status'] == 'COMPLETED' ? 1 : 0;

        if (!$model->save()) {
            return \yii\helpers\Json::encode($model->errors);
        }

        return \yii\helpers\Json::encode($model);


    }

    /**
     * Creates a new TouristPackages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TouristPackages();

        $servicios = new \common\models\Servicios();

        if ($this->request->isPost) {
            $post = $this->request->post();
            if ($model->load($this->request->post())) {

                // print_r($model->description);
                // exit;
                $tipo = $servicios->limpiar_string($model->type->name);
                $name = $servicios->limpiar_string($model->name);
                for ($i = 0; $i < 7; $i++) {
                    if (isset($model["image_$i"])) {
                        $model["image_$i"] = $this->get_photo_url($model, $tipo, $name, $i);
                    }
                }

                $model->created_at = date("d-m-Y H:i:s");
                $model->updated_at = date("d-m-Y H:i:s");
                $model->save();
                $this->savePayment($model->id, $post);
                return $this->redirect(['list']);
                // return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    function savePayment($id, $post){


        for ($i=1; $i<12; $i++) {
                
            if (isset($post['adults'][$i])) {

                $model = \frontend\models\TouristPackagesPayments::find()->where(['tourist_packages_id' => $id, 'from' => $i])->one();
                if (!$model) {

                    $model = new \frontend\models\TouristPackagesPayments();
                    $model->from = $i;
                    $model->until = $i;
                }
                    
                $model->adults_amount = $post['adults'][$i];
                if (isset($post['kids'][$i])) {
                    $model->kids_amount = $post['kids'][$i];
                }

                $model->tourist_packages_id = $id;
                $model->created_at = date("d-m-Y H:i:s");
                $model->updated_at = date("d-m-Y H:i:s");
                if (!$model->save()) {
                    print_r($model->errors);
                    exit;
                }
            }

            
        }

        $this->savePaymentRange($post, $id, 11, 15);
        $this->savePaymentRange($post, $id, 16, 20);
        $this->savePaymentRange($post, $id, 20, 20);
           

    }


    function savePaymentRange($post, $id, $from, $until){

        if (isset($post['adults'][$from])) {

            $model = new \frontend\models\TouristPackagesPayments();
            $model->from = $from;
            $model->until = $until;
                
            $model->adults_amount = $post['adults'][$from];

            if (isset($post['kids'][$from])) {
                $model->kids_amount = $post['kids'][$from];
            }

            $model->tourist_packages_id = $id;
            $model->created_at = date("d-m-Y H:i:s");
            $model->updated_at = date("d-m-Y H:i:s");
            $model->save();


        }


    }


    function get_photo_url($model, $tipo, $titulo, $i){

        $field = "image_$i";
        $imagen = $model[$field];
        
        $path = "images/".$tipo;

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $titulo = str_replace(" ", '-', trim($titulo));
        $path = "$path/$titulo/";

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $date = new \DateTime();
        if (UploadedFile::getInstance($model, "$field")) {
            $model[$field] = UploadedFile::getInstance($model, "$field");
            $imagen = $path . "foto-$i-" . $date->getTimestamp() . ".". $model[$field]->extension;
            $model[$field]->saveAs($imagen);
            $model[$field] = $imagen;
        }
        return $imagen;

    }

    /**
     * Updates an existing TouristPackages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $post = $this->request->post();
        $servicios = new \common\models\Servicios();
        if ($this->request->isPost && $model->load($post)) {
            $model->updated_at = date("d-m-Y H:i:s");
            $tipo = $servicios->limpiar_string($model->type->name);
            for ($i = 0; $i < 7; $i++) {
                if (isset($model["image_$i"])) {
                    $model["image_$i"] = $this->get_photo_url($model, $tipo, $model->name, $i);
                }
            }
            $this->savePayment($model->id, $post);
            if (!$model->save()) {
                print_r($model->errors);
                exit;
            }
            return $this->redirect(['list']);
            // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TouristPackages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TouristPackages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TouristPackages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TouristPackages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
