<!-- Page Title -->
<div class="section section-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Товары</h1>
            </div>
        </div>
    </div>
</div>

<!-- Posts List -->
<div class="section blog-posts-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 blog-sidebar">
                <h4>Искать товар</h4>

                <form>
                    <div class="input-group">
                        <input class="form-control input-md" id="appendedInputButtons" type="text">
								<span class="input-group-btn">
									<button class="btn btn-md" type="button">Искать</button>
								</span>
                    </div>
                </form>
                <h4>Категории товаров</h4>
                <ul class="recent-posts">
                    <li><a href="#">Lorem ipsum dolor sit amet</a></li>
                    <li><a href="#">Sed sit amet metus sit</a></li>
                    <li><a href="#">Nunc et diam volutpat tellus ultrices</a></li>
                    <li><a href="#">Quisque sollicitudin cursus felis</a></li>
                </ul>
                <h4>Группы товаров</h4>
                <ul class="blog-categories">
                    <li><a href="#">Lorem ipsum</a></li>
                    <li><a href="#">Sed sit amet metus</a></li>
                    <li><a href="#">Nunc et diam </a></li>
                    <li><a href="#">Quisque</a></li>
                </ul>
                <h4>Бренды</h4>
                <ul>
                    <li><a href="#">January 2013</a></li>
                    <li><a href="#">February 2013</a></li>
                    <li><a href="#">March 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                </ul>
            </div>

            <div class="col-md-9">

                <? if (isset($model)): ?>
                    <? foreach ($model as $good): ?>

                        <div class="col-md-4 col-sm-6">
                            <div class="blog-post">
                                <!-- Post Info -->
                                <div class="post-info">
                                    <div class="post-date">
                                        <div class="date">30 JAN, 2013</div>
                                    </div>
                                    <div class="post-comments-count">
                                        <a href="page-blog-post-right-sidebar.html" title="Show Comments"><i
                                                class="glyphicon glyphicon-comment icon-white"></i>11</a>
                                    </div>
                                </div>
                                <!-- End Post Info -->
                                <!-- Post Image -->
                                <a href="page-blog-post-right-sidebar.html"><img src="<?= '/upload/goods/'.$good->image ?>"
                                                                                 class="post-image"
                                                                                 alt="Post Title"></a>
                                <!-- End Post Image -->
                                <!-- Post Title & Summary -->
                                <div class="post-title">
                                    <h3><a href="page-blog-post-right-sidebar.html">Post Title</a></h3>
                                </div>
                                <div class="post-summary">
                                    <p>Lorem ipsum sus, ac rhoncus eros diam id odio. Duis elementum
                                        ligula eu ipsum condimentum accumsan.</p>
                                </div>
                                <!-- End Post Title & Summary -->
                                <div class="post-more">
                                    <a href="page-blog-post-right-sidebar.html" class="btn btn-small">Read more</a>
                                </div>
                            </div>
                        </div>

                    <? endforeach; ?>
                <? endif ?>


            </div>
        </div>
    </div>
</div>
<!-- End Posts List -->
