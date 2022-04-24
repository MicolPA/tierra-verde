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

        <div class="col-md-6">
             <?php echo $form->field($model, 'location_id')->dropDownList(ArrayHelper::map(\frontend\models\Location::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...']); ?>
        </div>
        <div class="col-md-6">
             <?php echo $form->field($model, 'pick_up_location_id')->dropDownList(ArrayHelper::map(\frontend\models\Location::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...']); ?>
        </div>

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
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="bg-white pt-3">
               <p class="h5 text-center pb-3">PRECIOS POR PERSONAS</p>
                <table class="table">
                    <tr>
                        <th class="font-12 text-center p-0 border-0"></th>
                        <?php for ($i=1;$i<11;$i++): ?>
                            <th class="font-12 text-center p-0 border-0"><?= $i ?> PAX</th>
                        <?php endfor ?>
                        <th class="font-12 text-center p-0 border-0">11-15 PAX</th>
                        <th class="font-12 text-center p-0 border-0">16-20 PAX</th>
                        <th class="font-12 text-center p-0 border-0">>20 PAX</th>
                    </tr>
                    <tr>
                        <td class="p-0">
                            <input type="text" class="form-control text-center font-12 p-0" readonly value="Adultos" style="width: 80px">
                        </td>
                        <?php for ($i=1; $i<12;$i++): ?>
                            <?php 
                            $pack = \frontend\models\TouristPackagesPayments::find()->where(['tourist_packages_id' => $model['id'], 'from' => $i])->one();
                                $total = $pack ? $pack['adults_amount'] : null;
                             ?>
                            <td class="p-0">
                                <input type="number" name="adults[<?= $i ?>]" class="form-control text-center pr-0 pl-0" placeholder="N/A" value="<?= $total ?>">
                            </td>    
                        <?php endfor ?>
                        <td class="p-0">
                            <input type="number" name="adults[16]" class="form-control text-center pr-0 pl-0" placeholder="N/A">
                        </td>
                        <td class="p-0">
                            <input type="number" name="adults[20]" class="form-control text-center pr-0 pl-0" placeholder="N/A">
                        </td>
                    </tr>
                    <tr>
                        <td class="p-0">
                            <input type="text" class="form-control text-center font-12 p-0" readonly value="Níños" style="width: 80px">
                        </td>
                        <?php for ($i=1; $i<12;$i++): ?>
                            <?php 
                                $pack = \frontend\models\TouristPackagesPayments::find()->where(['tourist_packages_id' => $model['id'], 'from' => $i])->one();
                                $total = $pack ? $pack['kids_amount'] : null;
                            ?>
                            <td class="p-0">
                                <input type="number" name="kids[<?= $i ?>]" class="form-control text-center pr-0 pl-0" placeholder="N/A" value="<?= $total ?>">
                            </td>    
                        <?php endfor ?>
                        <td class="p-0">
                            <input type="number" name="kids[16]" class="form-control text-center pr-0 pl-0" placeholder="N/A">
                        </td>
                        <td class="p-0">
                            <input type="number" name="kids[20]" class="form-control text-center pr-0 pl-0" placeholder="N/A">
                        </td>
                    </tr>
                </table>
            </div>
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


