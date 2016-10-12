<?php
use yii\helpers\Url;
use common\models\Pages;
use app\components\PageWidget;
use common\models\Reqvizit;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$url = $controller.'/'.$action;
$modelPages = Pages::find()->where(['status'=>1])->all();
$phone = Reqvizit::getPhoneNumber();
?>


<header id="header">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-4">
                    <div class="top-number"><p><i class="fa fa-phone-square"></i>  <?= $phone?></p></div>
                </div>
                <div class="col-sm-6 col-xs-8">
                    <div class="social">
                        <ul class="social-share">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                        </ul>
                        <div class="search">
                            <form role="form">
                                <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                <i class="fa fa-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->
    </div><!--/.top-bar-->

    <nav class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= Url::to('/'); ?>"><img src="/carlate/images/logo.png" alt="logo"></a>
            </div>

            <div class="collapse navbar-collapse navbar-right">
                <ul class="nav navbar-nav">
        
                    <li class="<?= $url == 'site/index' ? 'active-bold' : null ?>">
                        <a href="<?= Url::to('/'); ?>">Главная</a>
                    </li>

                    <li class=" <?= $url == 'site/goods' ? 'active-bold' : null ?>">
                        <a href="<?= Url::to('/site/goods'); ?>">Товары</a>
                    </li>

                    <li class="<?= $url == 'site/service' ? 'active-bold' : null ?>">
                        <a href="<?= Url::to('/site/service'); ?>">Услуги</a>
                    </li>

                    <li class="<?= $url == 'site/gallery' ? 'active-bold' : null ?>">
                        <a href="<?= Url::to('/site/gallery'); ?>">Галерея</a>
                    </li>

                    <li class="<?= $url == 'site/video' ? 'active-bold' : null ?>">
                        <a href="<?= Url::to('/site/video'); ?>">Видео</a>
                    </li>

                    <li class="<?= $url == 'site/article' ? 'active-bold' : null ?>">
                        <a href="<?= Url::to('/site/article'); ?>">Статьи</a>
                    </li>



                    <li class="<?= $url == 'site/price-list' ? 'active-bold' : null ?>">
                        <a href="<?= Url::to('/site/price-list'); ?>">Прайс листы</a>
                    </li>

                    <li class="<?= $url == 'site/contact-us' ? 'active-bold' : null ?>">
                        <a href="<?= Url::to('/site/contact-us'); ?>">Контакты</a>
                    </li>

                    <?= PageWidget::widget(); ?>

                    <!--            --><?// if(yii::$app->user->isGuest): ?>
                    <!--                <li class="--><?//= $url == 'site/signup' ? 'active-bold' : null ?><!--">-->
                    <!--                    <a href="--><?//= Url::to('/site/signup'); ?><!--">Регистрация</a>-->
                    <!--                </li>-->
                    <!--            --><?// endif; ?>
                    <!---->
                    <li class="<?= $url == 'site/login' || $url == '/site/logout' ? 'active-bold' : null ?>">
                        <? if(yii::$app->user->isGuest): ?>
                            <a href="<?= Url::to('/site/login'); ?>">Вход</a>
                        <? else: ?>
                        <!--                    <a href="--><?//= Url::to('/site/logout'); ?><!--">Выход(--><?//= Yii::$app->user->identity->username ?><!--)</a>-->

                    </li>

                    <li>
                        <a href="<?= Url::to('/admin/index'); ?>">Админка</a>
                    </li>
                <? endif ?>
                </ul>
            </div>
        </div><!--/.container-->
    </nav><!--/nav-->

</header><!--/header-->