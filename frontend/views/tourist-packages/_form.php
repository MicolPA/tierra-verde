<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$ubicaciones = \frontend\models\Location::find()->orderBy(['name' => SORT_ASC])->all();

/* @var $this yii\web\View */
/* @var $model frontend\models\TouristPackages */
/* @var $form yii\widgets\ActiveForm */
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
</style>

<div class="">

    <?php $form = ActiveForm::begin(); ?>

   <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput() ?>
        </div>

        <div class="col-md-6">
             <?php echo $form->field($model, 'type_id')->dropDownList(ArrayHelper::map(\frontend\models\PackagesType::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...']); ?>
        </div>


       <div class="col-md-6">
            <div class="form-group">
                <label>Destinos</label>
                <multi-input class='bg-white border-0' name="languages">
                  <input class="input" list="languages2" name="languages">
                  <datalist id="languages2" name="languages">
                    <?php foreach ($ubicaciones as $u): ?>
                        <option value="<?= $u->name ?>"></option>
                    <?php endforeach ?>
                  </datalist>
                </multi-input>
            </div>
        </div>

       
        <div class="col-md-6">
            <div class="from-group">
                <label>Ubicación salida</label>
                <multi-input class='bg-white border-0' name="languages">
                  <input class="input" list="languages" name="languages">
                  <datalist id="languages" name="languages">
                    <?php foreach ($ubicaciones as $u): ?>
                        <option value="<?= $u->name ?>"></option>
                    <?php endforeach ?>
                  </datalist>
                </multi-input>
            </div>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'kids')->dropdownList(array(''=>'Seleccionar...', '1' => 'Si', '0' => 'No'), []); ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'age_restricted')->textInput(['type' => 'number']) ?>
        </div>

        <div class="col-md-12">
            <?= $form->field($model, 'descripcion')->textarea(['rows' => '10'])->label("Descripción") ?>
        </div>

       
   </div>
   <div class="row mb-3">
        <div class="col-md-12">
            <div class="bg-white pt-3">
               <p class="h5 text-center pb-3">PRECIOS POR PERSONAS</p>
                <table class="table">
                    <tr>
                        <?php for ($i=1;$i<11;$i++): ?>
                            <th class="font-12 text-center p-0 border-0"><?= $i ?> PAX</th>
                        <?php endfor ?>
                        <th class="font-12 text-center p-0 border-0">11-15 PAX</th>
                        <th class="font-12 text-center p-0 border-0">16-20 PAX</th>
                        <th class="font-12 text-center p-0 border-0">>20 PAX</th>
                    </tr>
                    <tr>
                        <?php for ($i=1; $i<12;$i++): ?>
                            <td class="p-0">
                                <input type="number" name="" class="form-control text-center" placeholder="<?= $i ?>">
                            </td>    
                        <?php endfor ?>
                        <td class="p-0">
                            <input type="number" class="form-control text-center" placeholder="N/A">
                        </td>
                        <td class="p-0">
                            <input type="number" class="form-control text-center" placeholder="N/A">
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
       <div class="col-md-12 text-left">
            <?= Html::submitButton('Guardar paquete', ['class' => 'btn btn-success']) ?>
        </div>
   </div>

    <?php ActiveForm::end(); ?>

</div>
