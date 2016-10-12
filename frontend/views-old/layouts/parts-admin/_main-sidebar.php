<?php
use yii\helpers\Url;

$userName = isset(yii::$app->user->identity->username)  ? yii::$app->user->identity->username : 'admin';


$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$url = $controller.'/'.$action;

?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>

        <ul class="sidebar-menu">

            <li class="<?= $url == 'admin/index' ? 'active' : null ?>" >
                <a href="<?= Url::to('/admin/index'); ?>">
                    <i class="fa fa-home"></i> <span>Главная</span>
                </a>
            </li>
            <li class="header">ТОВАРЫ</li>
            <li class="treeview <?= $url == 'goods/index' ||  $url == 'goods/create' ? 'active' : null ||  $url == 'goods/view' ? 'active' : null ||  $url == 'goods/update' ? 'active' : null ?>">
                <a href="#">
                    <i class="ion ion-bag"></i>
                    <span>Товары</span>
                    <span class="label label-primary pull-right from20-px-mr"><?= $this->context->countAllGoods ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'goods/index' ? 'active' : null ?>"><a href="<?= Url::to('/goods/index') ?>"><i class="fa <?= $url == 'goods/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                    <li class="<?= $url == 'goods/create' ? 'active' : null ?>"><a href="<?= Url::to('/goods/create') ?>"><i class="fa <?= $url == 'goods/create' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Добавить</a></li>
                </ul>
            </li>

            <li class="treeview <?= $url == 'goods-category/index' ||  $url == 'goods-category/create' ? 'active' : null ||  $url == 'goods-category/view' ? 'active' : null ||  $url == 'goods-category/update' ? 'active' : null?>">
                <a href="#">
                    <i class="ion ion-bag"></i>
                    <span>Категории</span>
                    <span class="label label-primary pull-right from20-px-mr"><?= $this->context->countAllGoodsCategory ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'goods-category/index'  ? 'active' : null ?>"><a href="<?= Url::to('/goods-category/index') ?>"><i class="fa <?= $url == 'goods-category/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                    <li class="<?= $url == 'goods-category/create' ? 'active' : null ?>"><a href="<?= Url::to('/goods-category/create') ?>"><i class="fa <?= $url == 'goods-category/create' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Добавить</a></li>
                </ul>
            </li>

            <li class="treeview <?= $url == 'goods-pod-category/index' ||  $url == 'goods-pod-category/create' ? 'active' : null ||  $url == 'goods-pod-category/view' ? 'active' : null ||  $url == 'goods-pod-category/update' ? 'active' : null?>">
                <a href="#">
                    <i class="ion ion-bag"></i>
                    <span>Подкатегории</span>
                    <span class="label label-primary pull-right from20-px-mr"><?= $this->context->countAllGoodsPodCategory ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'goods-pod-category/index' ? 'active' : null ?>"><a href="<?= Url::to('/goods-pod-category/index') ?>"><i class="fa <?= $url == 'goods-pod-category/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                    <li class="<?= $url == 'goods-pod-category/create' ? 'active' : null ?>"><a href="<?= Url::to('/goods-pod-category/create') ?>"><i class="fa <?= $url == 'goods-pod-category/create' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Добавить</a></li>
                </ul>
            </li>




            <li class="header">СТАТЬИ</li>

            <li class="treeview <?= $url == 'article/show' ||  $url == 'article/create' ? 'active' : null ||  $url == 'article/view' ? 'active' : null  ||  $url == 'article/update' ? 'active' : null  ?>">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Статьи</span>
                    <span class="label  pull-right from20-px-mr bg-green"><?= $this->context->countAllArticles ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'article/show'  ? 'active' : null ?>"><a href="<?= Url::to('/article/show') ?>"><i class="fa <?= $url == 'article/show' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                    <li class="<?= $url == 'article/index'  ? 'active' : null ?>"><a href="<?= Url::to('/article/create') ?>"><i class="fa <?= $url == 'article/create' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Добавить</a></li>
                 </ul>
            </li>
            <li class="treeview <?= $url == 'article-category/index' ||  $url == 'article-category/create' ? 'active' : null ||  $url == 'article-category/view' ? 'active' : null ||  $url == 'article-category/update' ? 'active' : null ?>">
                <a href="#">
                    <i class="fa fa-book"></i>
                    <span>Категории статей</span>
                    <span class="label  pull-right from20-px-mr bg-green"><?= $this->context->countAllArticleCategory  ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'article-category/index' ? 'active' : null ?>"><a href="<?= Url::to('/article-category/index') ?>"><i class="fa <?= $url == 'article-category/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                    <li class="<?= $url == 'article-category/create' ? 'active' : null ?>"><a href="<?= Url::to('/article-category/create') ?>"><i class="fa <?= $url == 'article-category/create' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Добавить</a></li>
                </ul>
            </li>
            </li>
            <li class="header">МЕДИЯ</li>
            <li class="treeview <?= $url == 'slider-photo/index' ||  $url == 'slider-photo/create' ? 'active' : null ?>">
                <a href="#">
                    <i class="fa fa-photo"></i>
                    <span>Cлайдер</span>
                    <span class="label  pull-right from20-px-mr bg-yellow"><?= $this->context->countAllSliderFotos  ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'slider-photo/index' ? 'active' : null ?>"><a href="<?= Url::to('/slider-photo/index') ?>"><i class="fa <?= $url == 'slider-photo/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                </ul>

            <li class="treeview <?= $url == 'gallery/index' ||  $url == 'gallery/create' ? 'active' : null ?>" >
                <a href="#">
                    <i class="fa fa-object-ungroup"></i>
                    <span>Галерея</span>
                    <span class="label  pull-right from20-px-mr bg-yellow"><?= $this->context->countAllGalleryPhotos  ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'gallery/index' ? 'active' : null ?>"><a href="<?= Url::to('/gallery/index') ?>"><i class="fa <?= $url == 'gallery/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                </ul>
            </li>

            <li class="treeview <?= $url == 'video/index' ||  $url == 'video/create' ? 'active' : null ?>">
                <a href="#">
                    <i class="fa fa-video-camera"></i>
                    <span>Видео галерея</span>
                    <span class="label  pull-right from20-px-mr bg-yellow"><?= $this->context->countAllVideo  ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'video/index' ? 'active' : null ?>"><a href="<?= Url::to('/video/index') ?>"><i class="fa <?= $url == 'video/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                    <li class="<?= $url == 'video/create' ? 'active' : null ?>"><a href="<?= Url::to('/video/create') ?>"><i class="fa <?= $url == 'video/create' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Добавить</a></li>
                </ul>
            </li>


            <li class="header">ДОПОЛНИТЕЛЬНО</li>
            <li class="treeview <?= $url == 'message/index'  ? 'active' : null ?>">
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span>Сообщения</span>
                    <span class="label  pull-right from20-px-mr bg-red"><?= $this->context->countAllMessage ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'message/index' ? 'active' : null ?>"><a href="<?= Url::to('/message/index') ?>"><i class="fa <?= $url == 'message/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                </ul>
            </li>

            <li class="treeview <?= $url == 'price-list/index'  ? 'active' : null ?>">
                <a href="#">
                    <i class="fa fa-list"></i>
                    <span>Прайс лист</span>
                    <span class="label  pull-right from20-px-mr bg-red"></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'price-list/index' ? 'active' : null ?>"><a href="<?= Url::to('/price-list/index') ?>"><i class="fa <?= $url == 'price-list/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                    <li class="<?= $url == 'price-list/create' ? 'active' : null ?>"><a href="<?= Url::to('/price-list/create') ?>"><i class="fa <?= $url == 'price-list/create' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Добавить</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-refresh"></i>
                    <span>Кеш</span>
                    <span class="label label-primary pull-right from20-px-mr"></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class=""><a href="<?= Url::to('/cash/clear') ?>"><i class="fa fa-circle-o"></i>Очистить</a></li>
                </ul>
            </li>

            <li class="treeview <?= $url == 'pages/index' ||  $url == 'pages/create' ? 'active' : null ?>">
                <a href="#">
                    <i class="fa fa-file-text"></i>
                    <span>Cтраницы</span>
                    <span class="label label-primary pull-right from20-px-mr"></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">

                        <li class="<?= $url == 'pages/index' ? 'active' : null ?>"><a href="<?= Url::to('/pages/index') ?>"><i class="fa <?= $url == 'pages/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                        <li class="<?= $url == 'pages/create' ? 'active' : null ?>"><a href="<?= Url::to('/pages/create') ?>"><i class="fa <?= $url == 'pages/create' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Добавить</a></li>

                </ul>
            </li>

            <li class="treeview <?= $url == 'reqvizit/index' ? 'active' : null ?>">
                <a href="#">
                    <i class="fa fa-info"></i>
                    <span>Реквизиты</span>
                    <span class="label label-primary pull-right from20-px-mr"></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                        <li class="<?= $url == 'reqvizit/index' ? 'active' : null ?>"><a href="<?= Url::to('/reqvizit/index') ?>"><i class="fa <?= $url == 'reqvizit/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                </ul>
            </li>

            <li class="treeview <?= $url == 'config/index' ? 'active' : null ?>">
                <a href="#">
                    <i class="fa fa-toggle-on"></i>
                    <span>Настройки</span>
                    <span class="label label-primary pull-right from20-px-mr"></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                        <li class="<?= $url == 'config/index' ? 'active' : null ?>"><a href="<?= Url::to('/config/index') ?>"><i class="fa <?= $url == 'config/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                </ul>
            </li>






        </ul>
    </section>
    <!-- /.sidebar -->
</aside>