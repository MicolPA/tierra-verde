<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Location */

$this->title = 'Registrar ubicación';
$this->params['breadcrumbs'][] = ['label' => 'Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="location-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
