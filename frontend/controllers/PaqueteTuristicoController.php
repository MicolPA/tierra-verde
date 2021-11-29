<?php

namespace frontend\controllers;


use yii\filters\VerbFilter;
use frontend\models\TouristPackagesSearch;

class PaqueteTuristicoController extends \yii\web\Controller
{

    public function behaviors()
    {
        // $this->layout = 'admin-menu';
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
    public function actionIndex()
    {

        $searchModel = new TouristPackagesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
