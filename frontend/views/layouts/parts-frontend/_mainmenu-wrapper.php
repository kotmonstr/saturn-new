<?php
use yii\helpers\Url;
use common\models\Pages;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$url = $controller.'/'.$action;
$modelPages = Pages::find()->where(['status'=>1])->all();

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

                <li class="<?= $url == 'site/service' ? 'active' : null ?>">
                    <a href="<?= Url::to('/site/service'); ?>">Услуги</a>
                </li>
                
                <li class="<?= $url == 'site/gallery' ? 'active' : null ?>">
                    <a href="<?= Url::to('/site/gallery'); ?>">Галерея</a>
                </li>

                <li class="<?= $url == 'site/about' ? 'active' : null ?>">
                    <a href="<?= Url::to('/site/about'); ?>">О компании</a>
                </li>

                <li class="<?= $url == 'site/contact-us' ? 'active' : null ?>">
                    <a href="<?= Url::to('/site/contact-us'); ?>">Контакты</a>
                </li>

                <? if($modelPages): ?>
                    <? foreach ($modelPages as $page): ?>
                        <? $curPageSlug = !empty($_GET['slug']) ? $_GET['slug'] : null; ?>

                       <li class="<?= isset($curPageSlug) && $curPageSlug == $page->slug ? 'active' : null ?>">
                            <a href="<?= Url::to(['/site/page','slug'=>$page->slug]); ?>"><?= $page->name ?></a>
                        </li>
                    <? endforeach; ?>
                <? endif; ?>

                <? if(yii::$app->user->isGuest): ?>
                    <li class="<?= $url == 'site/signup' ? 'active' : null ?>">
                        <a href="<?= Url::to('/site/signup'); ?>">Регистрация</a>
                    </li>
                <? endif; ?>

                <li class="<?= $url == 'site/login' || $url == '/site/logout' ? 'active' : null ?>">
                    <? if(yii::$app->user->isGuest): ?>
                        <a href="<?= Url::to('/site/login'); ?>">Вход</a>
                    <? else: ?>
                        <a href="<?= Url::to('/site/logout'); ?>">Выход(<?= Yii::$app->user->identity->username ?>)</a>
                    <? endif ?>
                </li>

                <li>
                    <a href="<?= Url::to('/admin/index'); ?>">Админка</a>
                </li>
            </ul>
        </nav>
    </div>
</div>



