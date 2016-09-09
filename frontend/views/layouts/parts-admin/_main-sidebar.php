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
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/images/logo-saturn-sque.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $userName?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
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
            <li class="header">Главное меню управления</li>

            <li class="<?= $url == 'admin/index' ? 'active' : null ?>" >
                <a href="<?= Url::to('/admin/index'); ?>">
                    <i class="fa fa-home"></i> <span>Главная</span>
                </a>
            </li>
            <li class="header">ТОВАРЫ</li>
            <li class="treeview <?= $url == 'goods/index' ||  $url == 'goods/create' ? 'active' : null ||  $url == 'goods/view' ? 'active' : null ||  $url == 'goods/update' ? 'active' : null ?>">
                <a href="#">
                    <i class="fa fa-diamond"></i>
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
                    <i class="fa fa-diamond"></i>
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
                    <i class="fa fa-diamond"></i>
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
                    <span class="label label-primary pull-right from20-px-mr bg-red"><?= $this->context->countAllArticles ?></span>
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
                    <span class="label label-primary pull-right from20-px-mr"><?= $this->context->countAllArticleCategory  ?></span>
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
                    <span class="label label-primary pull-right from20-px-mr"><?= $this->context->countAllSliderFotos  ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'slider-photo/index' ? 'active' : null ?>"><a href="<?= Url::to('/slider-photo/index') ?>"><i class="fa <?= $url == 'slider-photo/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                </ul>

            <li class="treeview <?= $url == 'gallery/index' ||  $url == 'gallery/create' ? 'active' : null ?>" >
                <a href="#">
                    <i class="fa fa-photo"></i>
                    <span>Галерея</span>
                    <span class="label label-primary pull-right from20-px-mr"><?= $this->context->countAllGalleryPhotos  ?></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'gallery/index' ? 'active' : null ?>"><a href="<?= Url::to('/gallery/index') ?>"><i class="fa <?= $url == 'gallery/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-photo"></i>
                    <span>Видео галерея</span>
                    <span class="label label-primary pull-right from20-px-mr"></span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= $url == 'gallery/index' ? 'active' : null ?>"><a href="<?= Url::to('/gallery/index') ?>"><i class="fa <?= $url == 'gallery/index' ? 'fa-circle' : 'fa-circle-o' ?> text-aqua"></i> Просмотреть</a></li>
                </ul>
            </li>


            <li class="header">НЕ ГОТОВО</li>







        </ul>
    </section>
    <!-- /.sidebar -->
</aside>