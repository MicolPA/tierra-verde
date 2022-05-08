<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use asmoday74\ckeditor5\EditorClassic;

$ubicaciones = \frontend\models\Location::find()->orderBy(['name' => SORT_ASC])->all();
?>

<style>
    input[type="file"]#inputfile{
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}
label[for="inputfile"] {
    font-size: 14px;
    font-weight: 600;
    color: #000;
    background-color: #fff;
    display: inline-block;
    transition: all .5s;
    cursor: pointer;
    padding: 15px 40px !important;
    text-transform: uppercase;
    width: 100%;
    text-align: center;
}
.ck-editor__editable_inline {
        min-height: 200px;
        max-height: 200px;
    }
</style>

<div class="">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput() ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'max_people')->textInput()->label("Cupo") ?>
        </div>

        <div class="col-md-6">
             <?php echo $form->field($model, 'type_id')->dropDownList(ArrayHelper::map(\frontend\models\PackagesType::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...']); ?>
        </div>

        <div class="col-md-6">
             <?php echo $form->field($model, 'sub_type_id')->dropDownList(ArrayHelper::map(\frontend\models\PackagesSubType::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...']); ?>
        </div>

        <div class="col-md-12">
             <?php echo $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(\frontend\models\Location::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...']); ?>
        </div>
        <!-- <div class="col-md-6">
             <?php //echo $form->field($model, 'pick_up_location_id')->dropDownList(ArrayHelper::map(\frontend\models\Location::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...']); ?>
        </div> -->

        <div class="col-md-3">
            <?= $form->field($model, 'kids')->dropdownList(array(''=>'Seleccionar...', '1' => 'Si', '0' => 'No'), []); ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'age_restricted')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'kids_age_min')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'kids_age_max')->textInput(['type' => 'number']) ?>
        </div>

        <div class="col-md-12">
            <?= $form->field($model, 'description')->widget(EditorClassic::className(),[
                'clientOptions' => [
                    'language' => 'es',
                    'uploadUrl' => '/tour/frontend/web/image',    //url for upload files
                    'uploadField' => 'image',   //field name in the upload form
                ],
                'options' => [
                    'row' => 6,
                    'style' => 'height: 400px;',
                    'width' => '100%',
                    'height' => '400px',
               ],
            ])->label("Descripción"); ?>
        </div>
        <div class="col-md-12">
            <?= $form->field($model, 'short_description')->textarea(['rows' => '4'])->label("Pequeña descripción"); ?>
        </div>
   
    </div>
    

    <div class="row div-lab">
        <div class="col-md-2">
            <div class="div-lab w-100">
                <?= $form->field($model, 'image_1')->fileInput([!$model ? "required" : "" => !$model ? "required" : "", 'id' => 'inputfile2'])->label('<i class="fas fa-upload mr-2"></i> Portada') ?>
            </div>
        </div>
        <div class="col-md-2 div-lab">
           <?= $form->field($model, 'image_2')->fileInput([])->label('<i class="fas fa-upload mr-2"></i> Imagen') ?>
        </div>
        <div class="col-md-2">
           <?= $form->field($model, 'image_3')->fileInput([])->label('<i class="fas fa-upload mr-2"></i> Imagen') ?>
        </div>
        <div class="col-md-2">
           <?= $form->field($model, 'image_4')->fileInput([])->label('<i class="fas fa-upload mr-2"></i> Imagen') ?>
        </div>
        <div class="col-md-2">
           <?= $form->field($model, 'image_5')->fileInput([])->label('<i class="fas fa-upload mr-2"></i> Imagen') ?>
        </div>
        <div class="col-md-2">
           <?= $form->field($model, 'image_6')->fileInput([])->label('<i class="fas fa-upload mr-2"></i> Imagen') ?>
        </div>
   </div>

   <div class="row">
       <div class="col-md-12 text-right">
            <?= Html::submitButton('Guardar paquete', ['class' => 'btn btn-success']) ?>
        </div>
   </div>

    <?php ActiveForm::end(); ?>

</div>


