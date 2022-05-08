<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TouristPackagesPayments */

$this->title = 'Editando precios';
$this->params['breadcrumbs'][] = ['label' => 'Tourist Packages Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tourist-packages-payments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'packagePayment' => $packagePayment,
        'model' => $model,
    ]) ?>

</div>
