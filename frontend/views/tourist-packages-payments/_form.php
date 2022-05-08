<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TouristPackagesPayments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tourist-packages-payments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from')->textInput() ?>

    <?= $form->field($model, 'until')->textInput() ?>

    <?= $form->field($model, 'adults_amount')->textInput() ?>

    <?= $form->field($model, 'kids_amount')->textInput() ?>

    <?= $form->field($model, 'tourist_packages_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
