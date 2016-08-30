<?php
use yii\helpers\Url;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$url = $controller.'/'.$action;
//vd($url);
?>
<!-- Navigation & Logo-->
<div class="mainmenu-wrapper">
    <div class="container">

        <nav id="mainmenu" class="mainmenu">
            <ul>
                <li class="logo-wrapper"><a href="/"><img src="/PURPOSE/img/mPurpose-logo.png" alt="Multipurpose Twitter Bootstrap Template"></a></li>
                <li class="<?= $url == 'site/index' ? 'active' : null ?>">
                    <a href="<?= Url::to('/'); ?>">Главная</a>
                </li>

                <li class="<?= $url == 'site/goods' ? 'active' : null ?>">
                    <a href="<?= Url::to('/site/goods'); ?>">Товары</a>
                </li>

                <li class="">
                    <a href="<?= Url::to('/'); ?>">Услуги</a>
                </li>

                <li class="">
                    <a href="<?= Url::to('/'); ?>">О нас</a>
                </li>

                <li class="">
                    <a href="<?= Url::to('/'); ?>">Регистрация</a>
                </li>

                <li class="">
                    <a href="<?= Url::to('/'); ?>">Вход</a>
                </li>

                <li>
                    <a href="<?= Url::to('/admin/index'); ?>">Админка</a>
                </li>


            </ul>
        </nav>
    </div>
</div>