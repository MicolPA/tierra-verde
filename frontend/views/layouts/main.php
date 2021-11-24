<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>


  <header class="mb-4" style="z-index: 1">
    <nav class="bg-transparent " style="border-bottom: 0.1px solid #fff;">
        <div class="container d-flex flex-wrap">
          <ul class="nav me-auto">
            <li class="nav-item"><a href="#" class="nav-link text-white font-weight-bold px-2 active" aria-current="page">0045 043204434</a></li>
          </ul>
          <ul class="nav">
            <!-- <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Login</a></li> -->
            <!-- <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Sign up</a></li> -->
          </ul>
        </div>
    </nav>
    <div class="container d-flex flex-wrap justify-content-center pt-3 pb-3 border-none">
      <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">
            <img src="/frontend/web/images/logo-white.png" width='180px'>
        </span>
      </a>
      <div class="col-12 col-lg-auto mb-3 mb-lg-0">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="#" class="nav-link text-white px-2 active" aria-current="page">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-white px-2">About us</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-white px-2">DMC</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-white px-2">Other Service</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-white px-2">Blog</a></li>
            <li class="nav-item"><a href="#" class="nav-link text-white px-2">Contact us</a></li>
          </ul>
      </div>
    </div>
</header>


<main role="main" class="flex-shrink-0">
    <div class="">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
