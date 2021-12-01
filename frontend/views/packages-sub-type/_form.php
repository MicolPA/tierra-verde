<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<style>
    .icon-thread input[type='radio'] {opacity: 0;position:absolute;width:100%;height:10%;cursor: pointer;}
    .icon-thread input[type='radio'] + label {margin:.6em;color: #B1B1B1; text-shadow: 1px 1px #fff;}
    .icon-thread input[type='radio']:checked + label{color:#5F6F81;}
    .icon-thread li{display: inline-block; margin:2% 0 1%}
    .icon-thread ul{border-bottom: 1px dashed #D1D8DD;background:#FAFAFA;text-align:center}
</style>

<div class="packages-sub-type-form">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="icon-thread">
        <ul>

            <?php foreach ($icon as $i): ?>
            <li>
                <input type="radio" name="PackagesSubType[icon_id]" id="optionsRadios2" value="<?= $i->id ?>" <?= $model->icon_id == $i->id ? "checked": ""; ?> title="<?= $i->name ?>">
                <label class="radio h2" for="optionsRadios2"><i class="fas <?= $i->name ?>"></i></label>
            </li>  
            <?php endforeach ?>
        </ul>
    </div>

    <div class="form-group text-right">
        <?= Html::submitButton('Guardar cambios', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
