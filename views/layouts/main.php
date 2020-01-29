<?php

/* @var $this View */

/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <div class="container text-white">
        <div class="row">
            <div class="col-md-6">
                <uL class="nav own-nav">
                    <li class="own-text-white own-mr-15">Customer Service</li>
                    <li class="own-text-white own-text-12"><img width="10" src="/img/kv.png"> 1715</li>
                    <li class="own-text-white own-text-12 own-ml-25"><i class="far fa-clock own-text-white"></i> E-P
                        09.00-21.00
                    </li>
                </uL>
            </div>

            <div class="col-md-6 text-right">
                <uL class="nav own-float-right own-nav">
                    <li class="own-text-white own-mr-5">Hi, Kaupo kasutaja</li>
                    <li>
                        <form action="" method="post">
                            <button type="submit" class="logout own-logout own-text-white own-text-1-3rem"><img
                                        width="16" src="/img/lock.png"> LOG OUT
                            </button>
                        </form>
                    </li>
                </uL>
            </div>
        </div>
    </div>

</header>


<div class="container-fluid border-bottom">
    <div class="container">
        <nav class="navbar navbar-default own-white-havbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img width="130" src="/img/logo.png"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="/"><strong>Home</strong> &nbsp;<i class="fas fa-angle-right"></i></a></li>
                        <li><a href="#"><strong>About us</strong> &nbsp;<i class="fas fa-angle-right"></i></a></li>
                        <li><a href="#"><strong>Contact</strong></a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"> По-русски</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <nav class="navbar navbar-default own-second-navbar">
            <div class="container">
                <div class="col-md-11 col-md-offset-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/"><strong>My action</strong></a></li>
                        <li><a href="<?= Url::to(['customer/index']); ?>"><strong>Customers</strong></a></li>
                        <li><a href="<?= Url::to(['loan/index']); ?>"><strong>Loans</strong></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
