<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PackagesType */

$this->title = 'Update Packages Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Packages Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="packages-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
