<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TouristPackagesPayments */

$this->title = 'Create Tourist Packages Payments';
$this->params['breadcrumbs'][] = ['label' => 'Tourist Packages Payments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tourist-packages-payments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
        'packagePayment' => $packagePayment,
    ]) ?>

</div>
