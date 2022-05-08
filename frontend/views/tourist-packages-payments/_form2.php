<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>

<div class="row mb-3">
    <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-12">
            <?php echo $form->field($packagePayment, 'location_id')->dropDownList(ArrayHelper::map(\frontend\models\Location::find()->orderBy(['name' => SORT_ASC])->all(), 'id', 'name'),['prompt'=>'Seleccionar...'])->label('Ubicación'); ?>
        </div>
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
                        <?php for ($i=1; $i<12; $i++): ?>
                            <?php 
                            $pack = \frontend\models\TouristPackagesPayments::find()->where(['tourist_packages_id' => $model['id'], 'from' => $i, 'location_id' => $packagePayment['location_id']])->one();
                                $total = $pack ? $pack['adults_amount'] : null;
                             ?>
                            <td class="p-0">
                                <input type="number" name="adults[<?= $i ?>]" class="form-control text-center pr-0 pl-0" placeholder="N/A" value="<?= $total ?>">
                            </td>    
                        <?php endfor ?>
                        <?php 
                            $pack = \frontend\models\TouristPackagesPayments::find()->where(['tourist_packages_id' => $model['id'], 'from' => 16, 'location_id' => $packagePayment['location_id']])->one();
                                $total = $pack ? $pack['adults_amount'] : null;
                        ?>
                        <td class="p-0">
                            <input type="number" name="adults[16]" class="form-control text-center pr-0 pl-0" placeholder="N/A" value="<?= $total ?>">
                        </td>
                        <?php 
                            $pack = \frontend\models\TouristPackagesPayments::find()->where(['tourist_packages_id' => $model['id'], 'from' => 20, 'location_id' => $packagePayment['location_id']])->one();
                                $total = $pack ? $pack['adults_amount'] : null;
                        ?>
                        <td class="p-0">
                            <input type="number" name="adults[20]" class="form-control text-center pr-0 pl-0" placeholder="N/A" value="<?= $total ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="p-0">
                            <input type="text" class="form-control text-center font-12 p-0" readonly value="Níños" style="width: 80px">
                        </td>
                        <?php for ($i=1; $i<12; $i++): ?>
                            <?php 
                                $pack = \frontend\models\TouristPackagesPayments::find()->where(['tourist_packages_id' => $model['id'], 'from' => $i, 'location_id' => $packagePayment['location_id']])->one();
                                $total = $pack ? $pack['kids_amount'] : null;
                            ?>
                            <td class="p-0">
                                <input type="number" name="kids[<?= $i ?>]" class="form-control text-center pr-0 pl-0" placeholder="N/A" value="<?= $total ?>">
                            </td>    
                        <?php endfor ?>
                        <td class="p-0">
                            <?php 
                                $pack = \frontend\models\TouristPackagesPayments::find()->where(['tourist_packages_id' => $model['id'], 'from' => 16, 'location_id' => $packagePayment['location_id']])->one();
                                $total = $pack ? $pack['kids_amount'] : null;
                            ?>
                            <input type="number" name="kids[16]" class="form-control text-center pr-0 pl-0" placeholder="N/A" value="<?= $total ?>">
                        </td>
                        <?php 
                                $pack = \frontend\models\TouristPackagesPayments::find()->where(['tourist_packages_id' => $model['id'], 'from' => 20, 'location_id' => $packagePayment['location_id']])->one();
                                $total = $pack ? $pack['kids_amount'] : null;
                            ?>
                        <td class="p-0">
                            <input type="number" name="kids[20]" class="form-control text-center pr-0 pl-0" placeholder="N/A" value="<?= $total ?>">
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col-md-12 pt-4">
            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>