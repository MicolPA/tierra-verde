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
            <li class="nav-item"><a href="/" class="nav-link text-white font-weight-bold px-2 active" aria-current="page"><?= Yii::$app->params['phone'] ?></a></li>
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
            <li class="nav-item"><a href="/" class="nav-link text-white px-2 active" aria-current="page">Home</a></li>
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
            <div class="col-md-9">
            <a href="#" class="nav-link text-white font-weight-normal px-2 active" aria-current="page"><?= Yii::$app->params['phone'] ?></a>
              
            </div>
            <div class="col-md-3">
              <a href="#" class="nav-link text-white font-weight-normal px-2 float-right" aria-current="page"><i class="fas fa-heart mr-2"></i> Wishlist</a>
              <?php if (!isset(Yii::$app->user->identity->id)): ?>
                <a href="/frontend/web/site/login" class="nav-link text-white font-weight-normal px-2 float-right" aria-current="page"><i class="fas fa-lock mr-2"></i> Sign in</a>
              <?php else: ?>
                  <a href="/frontend/web/user/profile" class="nav-link text-white font-weight-normal px-2 float-right" aria-current="page"><i class="fas fa-user mr-2"></i> Profile</a>
              <?php endif ?>
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
    
    <a class="navbar-brand" href="/"><img src="/frontend/web/images/logo-white.png" width='100px'></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto">
      </ul>
      <ul class="navbar-nav float-right">
            <li class="nav-item mr-3">
              <a class="nav-link active font-weight-light" href="/">Home</a>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link active font-weight-light" href="https://www.mitierraverde.com/about-us/">About us</a>
            </li>
            <li class="nav-item mr-3">
              <a class="nav-link active font-weight-light" href="#">DMC</a>
            </li>
           <li class="nav-item mr-3 dropdown">
              <a class="nav-link dropdown-toggle active font-weight-light" href="#" id="dropdown07" data-toggle="dropdown" aria-expanded="false">Other Services</a>
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

<footer class=" mt-auto pt-5 pb-5 text-muted bg-dark">
    <div class="container">
        <div class="row text-white">
          <div class="col-md-4">
            <p class="h6 font-weight-normal mb-4">NEED HELP?</p>
            <p class="mb-0">
              <p class="mb-3">
                <i class="fas fa-phone-alt mr-2 font-20"></i> <span class="h5 font-weight-light">+45 423 44599</span>
              </p>
              <p class="mb-3">
                <i class="far fa-envelope mr-2 font-20"></i> <span class="h5 font-weight-light">help@citytours.com</span>
              </p>
            </p>
          </div>
          <div class="col-md-4">
            <p class="h6 font-weight-normal mb-2">ABOUT</p>
            <p class="mb-0 14 font-weight-light">
              <p class="mb-0 font-weight-light">
                <a href="#" class="text-white"><span>Who we are</span></a>
              </p>
              <p class="mb-0 font-weight-light">
                <a href="#" class="text-white"><span>Blog</span></a>
              </p>
              <p class="mb-0 font-weight-light">
                <a href="#" class="text-white"><span>Help - Faq</span></a>
              </p>
              <p class="mb-0 font-weight-light">
                <a href="#" class="text-white"><span>Terms and conditions</span></a>
              </p>
            </p>
          </div>
          <div class="col-md-4">
            <p class="h6 font-weight-normal mb-2">DISCOVER</p>
            <p class="mb-0 14 font-weight-light">
              <p class="mb-0 font-weight-light">
                <a href="#" class="text-white"><span>City tours</span></a>
              </p>
              <p class="mb-0 font-weight-light">
                <a href="#" class="text-white"><span>Museum tours</span></a>
              </p>
              <p class="mb-0 font-weight-light">
                <a href="#" class="text-white"><span>Historic building</span></a>
              </p>
              <p class="mb-0 font-weight-light">
                <a href="#" class="text-white"><span>Walking tours</span></a>
              </p>
            </p>
          </div>
          <div class="col-md-12 text-center text-white">
            <p class="float-left">&copy; </p>
          </div>
        </div>

        <div class="row">
          
        </div>
        
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
