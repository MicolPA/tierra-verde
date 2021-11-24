<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TouristPackages */

$this->title = 'Creación de paquete';
$this->params['breadcrumbs'][] = ['label' => 'Tourist Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>
        </div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
