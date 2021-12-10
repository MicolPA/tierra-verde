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

  <header class="mb-4" style="z-index: 1;display: none;">
    <nav class="bg-transparent " style="border-bottom: 0.1px solid #fff;">
        <div class="container d-flex flex-wrap">
          <ul class="nav me-auto">
            <li class="nav-item"><a href="/" class="nav-link text-white font-weight-bold px-2 active" aria-current="page">0045 043204434</a></li>
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
<nav class="bg-transparent " style="z-index: 1;border-bottom: 0.1px solid #ccc;">
    <div class="container">
        <ul class="navbar-nav">
          <div class="row">
            <div class="col-md-10">
            <a href="#" class="nav-link text-white font-weight-normal px-2 active" aria-current="page">0045 043204434</a>
              
            </div>
            <div class="col-md-2">
            <a href="#" class="nav-link text-white font-weight-normal px-2" aria-current="page"><i class="fas fa-lock mr-2"></i> Sign in</a>
              
            </div>
          </div>
        </ul>
        <!-- <ul class="nav float-right d-inline">
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2 text-white">Login</a></li>
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2 text-white">Sign up</a></li>
        </ul> -->
    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-transparent" style="z-index:1">
  <div class="container">
    
    <a class="navbar-brand" href="/"><img src="/frontend/web/images/logo-white.png" width='180px'></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto">
      </ul>
      <ul class="navbar-nav float-right">
            <li class="nav-item mr-3">
              <a class="nav-link active font-weight-light" href="#">Home</a>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link active font-weight-light" href="#">About us</a>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link active font-weight-light" href="#">DMC</a>
            </li>
           <li class="nav-item mr-3 dropdown">
              <a class="nav-link dropdown-toggle active font-weight-light" href="#" id="dropdown07" data-toggle="dropdown" aria-expanded="false">Other Service</a>
              <div class="dropdown-menu" aria-labelledby="dropdown07">
                <a class="dropdown-item" href="#">Private tours</a>
                <a class="dropdown-item" href="#">University programs</a>
                <a class="dropdown-item" href="#">Private circuit</a>
              </div>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link active font-weight-light" href="#">Blog</a>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link active font-weight-light" href="#">Contact us</a>
            </li>
            
      </ul>
    </div>
  </div>
</nav>


<main role="main" class="flex-shrink-0">
    <div class="">
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
