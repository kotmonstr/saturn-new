<?php
use yii\helpers\Url;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$url = $controller.'/'.$action;
?>

<li class="<?= $url == 'site/page' ? 'active-bold' : null ?>">
    <a class="start-menu-page" href="#">Страницы</a>
        <ul id="dop-menu">
            <? if($model): ?>
            <? foreach ($model as $page): ?>
            <? $curPageSlug = !empty($_GET['slug']) ? $_GET['slug'] : null; ?>

                <li class="<?= isset($curPageSlug) && $curPageSlug == $page->slug ? 'active' : null ?>">
                    <a class="already-wait" href="<?= Url::to(['/site/page','slug'=>$page->slug]); ?>"><?= $page->name ?></a>
                </li>

            <? endforeach; ?>
            <? endif; ?>
        </ul>    
</li>
<style>
    #dop-menu{
        background-color: #00a7d0;

    }
    .already-wait {
        color: #ffffff!important;
        line-height: 20px;
    }
</style>


