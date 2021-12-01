<?php

use yii\helpers\Html;

$this->title = 'Actualizar Subcategoría ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Packages Sub Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="packages-sub-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
