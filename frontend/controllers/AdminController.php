<?php

namespace frontend\controllers;

use yii\filters\VerbFilter;

class AdminController extends \yii\web\Controller
{

   public function behaviors()
    {
        $this->layout = 'admin-menu';
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                ],
            ]
        );
    }
    public function actionIndex()
    {
        return $this->render('index');
    }

}
