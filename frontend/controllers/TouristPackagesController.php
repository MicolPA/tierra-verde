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
            print_r($this->request->post());

            
            if ($model->load($this->request->post())) {

                $tipo = $servicios->limpiar_string($model->type->name);
                for ($i = 0; $i < 7; $i++) {
                    if (isset($model["image_$i"])) {
                        $model["image_$i"] = $this->get_photo_url($model, $tipo, $model->name, $i);
                    }
                }
                $model->location_id = 1;
                $model->pick_up_location_id = "1";
                $model->created_at = date("d-m-Y H:i:s");
                $model->updated_at = date("d-m-Y H:i:s");
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    function get_photo_url($model, $tipo, $titulo, $i){

        $imagen = null;
        $path = "images/".$tipo;

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $path = "$path/$titulo/";

        echo $path;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $field = "image_$i";
        if (UploadedFile::getInstance($model, "$field")) {
            $model[$field] = UploadedFile::getInstance($model, "$field");
            $imagen = $path . "foto-$i-" . date('Y-m-d H-i-s') . ".". $model[$field]->extension;
            $model[$field]->saveAs($imagen);
            $model[$field] = $imagen;
        }else{
            $imagen = $model[$field];
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

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
