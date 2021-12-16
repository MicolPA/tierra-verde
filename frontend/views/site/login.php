<?php


use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    label[for="rememberme"]{
        padding-top: 3px;
    }
</style>

<div class="jumbotron text-center bg-transparent bg-image position-relative divbackground pt-5 pb-5" id='fondo' style="background-image:url(/frontend/web/images/stock-4.jpg);">
    <div class="align-middle h-100" style="padding-top: 10rem;">
       <h1 class="display-4 text-white font-weight-bold-2 position-relative mb-0 mt-5" style="position: relative">USER LOGIN</h1>
        <p class="lead text-white mb-4 position-relative">LOGIN TO YOUR ACCOUNT</p>
    </div>
</div>

<div class="container">

    <div class="row align-items-center mb-5 mt-5">
        
        <div class="col-md-6 text-center m-auto bg-white shadow border-rounded p-5">
            <div class="2-50 m-auto pb-5">
                <img src="/frontend/web/images/user.png" width="150px">
            </div>
            <p class="h1 font-weight-bold text-success" style="font-weight:800 !important"></p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => 'USERNAME'])->label(false) ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'PASSWORD'])->label(false) ?>

                <div class="row mt-4 mb-4">
                    <div class="col-md-4">
                        <div class="custom-control custom-checkbox mb-2 w-100 text-left">
                            <input type="checkbox" class="custom-control-input" id="rememberme">
                            <label for="rememberme" class="custom-control-label">Remember me</label>
                        </div>
                    </div>
                    <div class="col-md-8 pt-1 text-gray font-14 text-right">Forgot the password? <u><?= Html::a('Reset it here', ['site/request-password-reset'], ['class' => 'text-gray font-14']) ?></u>
                    </div>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
                    <p class="mt-3">
                        <?= Html::a("Don't have an account? Sign up", ['site/signup', 'url' => $url], ['class' => 'text-gray font-14 mt-3']) ?>
                    </p>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        
    </div>
</div>
