<?php

namespace frontend\controllers;

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

                $model = new \frontend\models\TouristPackagesPayments();
                $model->from = $i;
                $model->until = $i;
                    
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

        $servicios = new \common\models\Servicios();
        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->updated_at = date("d-m-Y H:i:s");
            $tipo = $servicios->limpiar_string($model->type->name);
            for ($i = 0; $i < 7; $i++) {
                if (isset($model["image_$i"])) {
                    $model["image_$i"] = $this->get_photo_url($model, $tipo, $model->name, $i);
                }
            }
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
