<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jumbotron text-center bg-transparent bg-image position-relative divbackground pt-5 pb-5" id='fondo' style="background-image:url(/frontend/web/images/stock-4.jpg);">
    <div class="align-middle h-100" style="padding-top: 10rem;">
       <h1 class="display-4 text-white font-weight-bold-2 position-relative mb-0 mt-5" style="position: relative">SIGN UP</h1>
        <p class="lead text-white mb-4 position-relative">CREATE AN ACCOUNT</p>
    </div>
</div>

<div class="container">

    <div class="row align-items-center mb-5 mt-5">
        
        <div class="col-md-6 text-center m-auto bg-white shadow border-rounded p-5">
            <div class="2-50 m-auto pb-5">
                <img src="/frontend/web/images/user.png" width="150px">
            </div>
            <p class="h1 font-weight-bold text-success" style="font-weight:800 !important"></p>

            <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['autocomplete' => 'off']]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'USERNAME'])->label(false) ?>
                <?= $form->field($model, 'email')->textInput(['type' => 'email', 'placeholder' => 'EMAIL'])->label(false) ?>
                <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'FIRST NAME'])->label(false) ?>
                <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'LAST NAME'])->label(false) ?>
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'PASSWORD', 'autocomplete' => 'new-password'])->label(false) ?>


                <div class="form-group">
                    <?= Html::submitButton("CREATE ACCOUNT", ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
                    <p class="mt-3">
                        <?= Html::a("Don't have an account? Sign up", ['site/signup'], ['class' => 'text-gray font-14 mt-3']) ?>
                    </p>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        
    </div>
</div>
