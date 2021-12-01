<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAssetAdmin;
use common\widgets\Alert;

AppAssetAdmin::register($this);

$get = Yii::$app->request->get();
$page = isset($get['page']) ? $get['page'] : 0;
$class_inicio = $page == 0 ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-bold';
$class_miembro = $page == 1 ? 'bg-dark text-white' : 'text-dark';
$class_grupos = $page == 2 ? 'bg-dark text-white' : 'text-dark';
$class_ministerios = $page == 3 ? 'bg-dark text-white' : 'text-dark';
$class_zonas = $page == 4 ? 'bg-dark text-white' : 'text-dark';

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/frontend/web/images/logo.png">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php if (isset(Yii::$app->user->identity->id)): ?>
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex justify-content-center">
          <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
            <a class="navbar-brand brand-logo" href="/"><img class="ml-5" src="/frontend/web/images/logo.png" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="/"><img src="/frontend/web/images/logo.png" alt="logo" style="height: 30px" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-sort-variant"></span>
            </button>
          </div>  
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <h3>Panel de administración</h3>
            </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown mr-1">
            <!-- <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" id="messageDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-message-text mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="messageDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Messages</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="/frontend/web/images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">David Grey
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="/frontend/web/images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal">Tim Cook
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    New product launch
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                    <img src="/frontend/web/images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="item-content flex-grow">
                  <h6 class="ellipsis font-weight-normal"> Johnson
                  </h6>
                  <p class="font-weight-light small-text text-muted mb-0">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div> -->
          </li>
          <li class="nav-item dropdown mr-4">
           <!--  <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell mx-0"></i>
              <span class="count"></span>
            </a> -->
            <!-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="mdi mdi-information mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="mdi mdi-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="mdi mdi-account-box mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li> -->
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <!-- <img src="images/faces/face5.jpg" alt="profile"/> -->
              <span class="nav-profile-name">Hola, <?= Yii::$app->user->identity->first_name . " " . Yii::$app->user->identity->last_name ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="/frontend/web/site/logout">
                <i class="mdi mdi-logout text-primary"></i>
                Cerrar sesión 
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
        </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

          <li class="nav-item <?= strpos(Yii::$app->request->url, 'admin') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-bold' ?>">
            <a class="nav-link pt-4 pb-4 <?= strpos(Yii::$app->request->url, 'admin') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-bold' ?>" href="/frontend/web/admin">
              <i class="fas fa-home mr-3"></i>
              <span class="menu-title">Inicio</span>
            </a>
          </li>
          <li class="nav-item <?= strpos(Yii::$app->request->url, 'location') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-normal' ?>">
            <a class="nav-link pt-4 pb-4 <?= strpos(Yii::$app->request->url, 'location') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-normal' ?>" href="/frontend/web/location">
              <i class="fas fa-map-marker-alt mr-3"></i>
              <span class="menu-title">Ubicaciones</span>
            </a>
          </li>
          <li class="nav-item <?= strpos(Yii::$app->request->url, 'packages-type') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-normal' ?>">
            <a class="nav-link pt-4 pb-4 <?= strpos(Yii::$app->request->url, 'packages-type') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-normal' ?>" href="/frontend/web/packages-type">
              <i class="fas fa-umbrella-beach mr-3"></i>
              <span class="menu-title">Tipos de paquetes</span>
            </a>
          </li>
          <li class="nav-item <?= strpos(Yii::$app->request->url, 'packages-sub-type') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-normal' ?>">
            <a class="nav-link pt-4 pb-4 <?= strpos(Yii::$app->request->url, 'packages-sub-type') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-normal' ?>" href="/frontend/web/packages-sub-type">
              <i class="fas fa-umbrella-beach mr-3"></i>
              <span class="menu-title">Subcategorías de paquetes</span>
            </a>
          </li>
          <li class="nav-item <?= strpos(Yii::$app->request->url, 'tourist-packages') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-normal' ?>">
            <a class="nav-link pt-4 pb-4 <?= strpos(Yii::$app->request->url, 'tourist-packages') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-normal' ?>" href="/frontend/web/tourist-packages/list">
              <i class="fas fa-plane mr-3"></i>
              <span class="menu-title">Paquetes</span>
            </a>
          </li>
          <li class="nav-item <?= strpos(Yii::$app->request->url, 'users') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-normal' ?>">
            <a class="nav-link pt-4 pb-4 <?= strpos(Yii::$app->request->url, 'users') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-normal' ?>" href="/frontend/web/tourist-packages">
              <i class="fas fa-users mr-3"></i>
              <span class="menu-title">Usuarios</span>
            </a>
          </li>
          <li class="nav-item <?= strpos(Yii::$app->request->url, 'users') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-normal' ?>">
            <a class="nav-link pt-4 pb-4 <?= strpos(Yii::$app->request->url, 'users') ? 'bg-dark text-white' : 'text-dark text-secondary font-weight-normal' ?>" href="/frontend/web/tourist-packages">
              <i class="fas fa-chart-pie mr-3"></i>
              <span class="menu-title">Reportes</span>
            </a>
          </li>
          
        </ul>
      </nav>
    <?php endif ?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <?= $content ?>
        </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>  

    
</div>

<?php if(Yii::$app->session->hasFlash('success')):?>
    <?php
    $msj = Yii::$app->session->getFlash('success');
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { swal('Correcto','$msj','success');";
    echo '}, 1000);</script>';
    ?>
<?php endif; ?>  

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
