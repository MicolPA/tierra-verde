<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PackagesType */

$this->title = 'Registrar tipo de paquete';
$this->params['breadcrumbs'][] = ['label' => 'Packages Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packages-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
