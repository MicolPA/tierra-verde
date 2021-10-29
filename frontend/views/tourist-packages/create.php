<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TouristPackages */

$this->title = 'Create Tourist Packages';
$this->params['breadcrumbs'][] = ['label' => 'Tourist Packages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tourist-packages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
