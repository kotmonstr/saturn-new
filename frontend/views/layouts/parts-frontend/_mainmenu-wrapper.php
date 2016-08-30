<?php
use yii\helpers\Url;
?>
<!-- Navigation & Logo-->
<div class="mainmenu-wrapper">
    <div class="container">

        <nav id="mainmenu" class="mainmenu">
            <ul>
                <li class="logo-wrapper"><a href="/"><img src="/PURPOSE/img/mPurpose-logo.png" alt="Multipurpose Twitter Bootstrap Template"></a></li>
                <li class="active">
                    <a href="<?= Url::to('/'); ?>">Главная</a>
                </li>

                <li class="">
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