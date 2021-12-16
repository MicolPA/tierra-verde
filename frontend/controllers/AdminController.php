<?php

namespace frontend\controllers;

use Yii;
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

    public function actionCalculatePayment(){

        $post = Yii::$app->request->post();

        if ($post['count'] < 20) {

            $model = \frontend\models\TouristPackagesPayments::find()
            ->where(['tourist_packages_id' => $post['package']])
            ->andWhere(['>=', 'from', $post['count']])
            ->andWhere(['<=', 'until', $post['count']])
            ->one();

        }else{

            $model = \frontend\models\TouristPackagesPayments::find()
            ->where(['tourist_packages_id' => $post['package']])
            ->andWhere(['>=', 'from', $post['count']])
            ->one();
        }


        if (!$model) {
            $model = new \frontend\models\TouristPackagesPayments();
            $model->adults_amount = 0;
            $model->kids_amount = 0;
        }

        return \yii\helpers\Json::encode($model);

    }

}
