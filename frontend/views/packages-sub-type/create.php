<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\PackagesSubType */

$this->title = 'Crear subcategoría';
$this->params['breadcrumbs'][] = ['label' => 'Packages Sub Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="packages-sub-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
