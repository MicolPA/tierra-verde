<?php

namespace frontend\controllers;

use Yii;
use frontend\models\TouristPackagesPayments;
use frontend\models\TouristPackagesPaymentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TouristPackagesPaymentsController implements the CRUD actions for TouristPackagesPayments model.
 */
class TouristPackagesPaymentsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $this->layout = 'admin-menu';
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
     * Lists all TouristPackagesPayments models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new TouristPackagesPaymentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('index', [
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TouristPackagesPayments model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TouristPackagesPayments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $packagePayment = new TouristPackagesPayments();
        $post = Yii::$app->request->post();
        $model = \frontend\models\TouristPackages::findOne($id);

        if ($packagePayment->load($post)) {
            $this->savePayment($id, $post, $packagePayment['location_id']);
            return $this->redirect(['index', 'id' => $id]);
        }

        return $this->render('create', [
            'model' => $model,
            'packagePayment' => $packagePayment
        ]);
    }

    /**
     * Updates an existing TouristPackagesPayments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $packagePayment = $this->findModel($id);
        $post = Yii::$app->request->post();
        $model = \frontend\models\TouristPackages::findOne($packagePayment['tourist_packages_id']);

        if ($packagePayment->load($post) && $packagePayment->save()) {
            $this->savePayment($packagePayment['tourist_packages_id'], $post, $packagePayment['location_id']);
            return $this->redirect(['index', 'id' => $packagePayment['tourist_packages_id']]);
        }

        return $this->render('update', [
            'model' => $model,
            'packagePayment' => $packagePayment
        ]);
    }

    function savePayment($id, $post, $location){


        if ($id) {
            for ($i=1; $i<12; $i++) {
                
                if (isset($post['adults'][$i])) {

                    $model = \frontend\models\TouristPackagesPayments::find()
                    ->where(['tourist_packages_id' => $id, 'from' => $i, 'location_id' => $location])
                    ->one();
                    if (!$model) {

                        $model = new \frontend\models\TouristPackagesPayments();
                        $model->from = $i;
                        $model->until = $i;
                    }
                        
                    $model->adults_amount = $post['adults'][$i];
                    if (isset($post['kids'][$i])) {
                        $model->kids_amount = $post['kids'][$i];
                    }
                    $model->location_id = $location;
                    $model->tourist_packages_id = $id;
                    $model->created_at = date("d-m-Y H:i:s");
                    $model->updated_at = date("d-m-Y H:i:s");
                    if (!$model->save()) {
                        print_r($model->errors);
                        exit;
                    }
                }

                
            }

            $this->savePaymentRange($post, $id, $location, 11, 15);
            $this->savePaymentRange($post, $id, $location, 16, 20);
            $this->savePaymentRange($post, $id, $location, 20, 20);
        }
           

    }


    function savePaymentRange($post, $id, $location, $from, $until){

        if (isset($post['adults'][$from])) {

            $model = \frontend\models\TouristPackagesPayments::find()
            ->where(['tourist_packages_id' => $id, 'location_id' => $location])
            ->andWhere(['from' => $from, 'until' => $until])
            ->one();
            

            if (!$model) {
                $model = new \frontend\models\TouristPackagesPayments();
                $model->from = $from;
                $model->until = $until;
            }

            
                
            $model->adults_amount = $post['adults'][$from];

            if (isset($post['kids'][$from])) {
                $model->kids_amount = $post['kids'][$from];
            }

            $model->location_id = $location;
            $model->tourist_packages_id = $id;
            $model->created_at = date("d-m-Y H:i:s");
            $model->updated_at = date("d-m-Y H:i:s");
            $model->save();


        }


    }

    /**
     * Deletes an existing TouristPackagesPayments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TouristPackagesPayments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TouristPackagesPayments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TouristPackagesPayments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
