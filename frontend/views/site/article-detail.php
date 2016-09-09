<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= $model->title ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-sm-4 blog-sidebar">
                <h4>Поиск по Услугам</h4>
                <form>
                    <div class="input-group">
                        <input class="form-control input-md" id="appendedInputButtons" type="text">
								<span class="input-group-btn">
									<button class="btn btn-md" type="button">Искать</button>
								</span>
                    </div>
                </form>
                <h4>Последние</h4>
                <ul class="recent-posts">
                    <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li><a href="#">Sed sit amet metus sit</a></li>
                    <li><a href="#">Nunc et diam volutpat tellus ultrices</a></li>
                    <li><a href="#">Quisque sollicitudin cursus felis</a></li>
                </ul>
                <h4>Категории</h4>
                <ul class="blog-categories">
                    <li><a href="#">Lorem ipsum</a></li>
                    <li><a href="#">Sed sit amet metus</a></li>
                    <li><a href="#">Nunc et diam </a></li>
                    <li><a href="#">Quisque</a></li>
                </ul>
                <h4>Архив</h4>
                <ul>
                    <li><a href="#">January 2013</a></li>
                    <li><a href="#">February 2013</a></li>
                    <li><a href="#">March 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                </ul>
            </div>
            <!-- End Sidebar -->

            <div class="col-sm-8">
                <div class="blog-post blog-single-post">
                    <div class="single-post-title"><h3><?= $model->title ?></h3></div>
                    <div class="single-post-info">
                        <i class="glyphicon glyphicon-time"></i><?= Yii::$app->formatter->asDate($model->created_at, 'php:F, Y'); ?>
                    </div>
                    <div class="single-post-image">
                        <img src="/upload/article/<?= $model->image ?>" alt="Post Title">
                    </div>
                    <div class="single-post-content">
                        <h3><?= $model->title ?></h3>
                        <p><?= $model->content ?></p>
                    </div>

                </div>
            </div>
            <!-- End Blog Post -->
        </div>
    </div>
</div>