<?php
use yii\helpers\Url;
use common\models\Pages;
use app\components\PageWidget;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$url = $controller.'/'.$action;
$modelPages = Pages::find()->where(['status'=>1])->all();

?>

<div class="mainmenu-wrapper">
    <div class="container">

        <ul id="nav" class="mainmenu">
            <li class="logo-wrapper"><a href="/"><img src="/PURPOSE/img/mPurpose-logo.png" alt="Multipurpose Twitter Bootstrap Template"></a></li>
            <li class="<?= $url == 'site/index' ? 'active-bold' : null ?>">
                <a href="<?= Url::to('/'); ?>">Главная</a>
            </li>

            <li class="<?= $url == 'site/goods' ? 'active-bold' : null ?>">
                <a href="<?= Url::to('/site/goods'); ?>">Товары</a>
            </li>

            <li class="<?= $url == 'site/service' ? 'active-bold' : null ?>">
                <a href="<?= Url::to('/site/service'); ?>">Услуги</a>
            </li>

            <li class="<?= $url == 'site/gallery' ? 'active-bold' : null ?>">
                <a href="<?= Url::to('/site/gallery'); ?>">Галерея</a>
            </li>

            <li class="<?= $url == 'site/article' ? 'active-bold' : null ?>">
                <a href="<?= Url::to('/site/article'); ?>">Блог</a>
            </li>

            <li class="<?= $url == 'site/about' ? 'active-bold' : null ?>">
                <a href="<?= Url::to('/site/about'); ?>">О компании</a>
            </li>

            <li class="<?= $url == 'site/contact-us' ? 'active-bold' : null ?>">
                <a href="<?= Url::to('/site/contact-us'); ?>">Контакты</a>
            </li>

            <?= PageWidget::widget(); ?>

            <? if(yii::$app->user->isGuest): ?>
                <li class="<?= $url == 'site/signup' ? 'active-bold' : null ?>">
                    <a href="<?= Url::to('/site/signup'); ?>">Регистрация</a>
                </li>
            <? endif; ?>

            <li class="<?= $url == 'site/login' || $url == '/site/logout' ? 'active-bold' : null ?>">
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




    </div>
</div>

<style>
.active-bold{
    font-weight: bold;
    text-decoration:underline;
}
    #nav{
line-height: 40px;
        //float:left;
        width:100%;
        list-style:none;
        //font-weight:bold;
        //margin-bottom:10px;
        font-size: 14px;
    }
    #nav li{
        float:left;
        margin-right:10px;
        position:relative;
        display:block;
    }
    #nav li a{
        display:block;
        padding:5px 5px 0px 5px;
        //color:#fff;
        //background:#333;
        text-decoration:none;

        text-shadow:1px 1px 1px rgba(0,0,0,0.45); /* Тень текста, чтобы приподнять его на немного */
        //-moz-border-radius:2px;
        //-webkit-border-radius:2px;
       // border-radius:2px;
    }
    #nav li a:hover{
        //color:#fff;
        //background:#6b0c36;
        //background:rgba(107,12,54,0.75); /* Выглядит полупрозрачным */
        text-decoration:underline;
    }

    /*--- ВЫПАДАЮЩИЕ ПУНКТЫ ---*/
    #nav ul{
        list-style:none;
        position:absolute;
        left:-9999px; /* Скрываем за экраном, когда не нужно (данный метод лучше, чем display:none;) */
        opacity:0; /* Устанавливаем начальное состояние прозрачности */
        -webkit-transition:0.25s linear opacity; /* В Webkit выпадающие пункты будут проявляться */
    }
    #nav ul li{
        padding-top:1px; /* Вводим отступ между li чтобы создать иллюзию разделенных пунктов меню */
        float:none;
        //background:url(dot.gif);
        z-index: 30;
    }
    #nav ul a{
        white-space:nowrap; /* Останавливаем перенос текста и создаем многострочный выпадающий пункт */
        display:block;
    }
    #nav li:hover ul{ /* Выводим выпадающий пункт при наведении курсора */
        left:0; /* Приносим его обратно на экран, когда нужно */
        opacity:1; /* Делаем непрозрачным */
    }
    #nav li:hover a{ /* Устанавливаем стили для верхнего уровня, когда выводится выпадающий список */
        //background:#6b0c36;
        //background:rgba(107,12,54,0.75); /* Выглядит полупрозрачным */
        //text-decoration:underline;
    }
    #nav li:hover ul a{ /* Изменяем некоторые стили верхнего уровня при выводе выпадающего пункта */
        //text-decoration:none;
        -webkit-transition:-webkit-transform 0.075s linear;
    }
    #nav li:hover ul li a:hover{ /* Устанавливаем стили для выпадающих пунктов, когда курсор наводится на конкретный пункт */
        //background:#333;
        //background:rgba(51,51,51,0.75); /* Будет полупрозрачным */
        //text-decoration:underline;
        //-moz-transform:scale(1.05);
        //-webkit-transform:scale(1.05);

    }

</style>


