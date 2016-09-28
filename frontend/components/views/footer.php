<?
use yii\helpers\Url;

$video = isset($modelVideo) ? '<iframe class="fancybox" width="100%" height="100%" src="https://www.youtube.com/embed/'. $modelVideo->youtube_id .'" frameborder="0" allowfullscreen></iframe>' : '<img src="/PURPOSE/img/portfolio6.jpg" alt="Project Name">';
$url = isset($modelVideo) ? '/site/video?slug='.$modelVideo->slug : 'javascript:void(0)';
?>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-footer col-md-3 col-xs-6">
                <h3>Наши последние работы</h3>
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <a href="#">
                            <?= $video ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-footer col-md-2 col-xs-6">
                <h3>Страницы</h3>
                <ul class="no-list-style footer-navigate-section">
                    <li><a href="<?= Url::to('/site/goods'); ?>">Товары</a></li>
                    <li><a href="<?= Url::to('/site/service'); ?>">Услуги</a></li>
                    <li><a href="<?= Url::to('/site/gallery'); ?>">Галерея</a></li>
                    <li><a href="<?= Url::to('/site/video'); ?>">Видео</a></li>
                    <li><a href="<?= Url::to('/site/article'); ?>">Cтатьи</a></li>
                    <li><a href="<?= Url::to('/site/price-list'); ?>">Прайс-листы</a></li>
                    <li><a href="#">Site map</a></li>
                
                </ul>
            </div>
            <div class="col-footer col-md-4 col-xs-6">
                <h3>Контактные данные</h3>
                <p class="contact-us-details">
                    <?= $model->company_name ? '<b>Компания: </b>'. $model->company_name.'<br>' : null ?>
                    <?= $model->zip_code ? '<b>Индекс: </b>'. $model->zip_code .'<br>': null ?>
                    <?= $model->country ? '<b>Страна: </b>'. $model->country .'<br>': null ?>
                    <?= $model->address ? '<b>Адрес: </b>'. $model->address .'<br>': null ?>
                    <?= $model->mobile ? '<b>Телефон: </b>'. $model->mobile .'<br>': null ?>
                    <?= $model->fax && $model->fax != '' ? '<b>Fax: </b>'. $model->fax .'<br>' : null ?>
                    <?= $model->email ? '<b>Email: </b><a href="mailto:4443">'. $model->email .'</a><br>': null ?>
                </p>
            </div>
            <div class="col-footer col-md-3 col-xs-6">
                <h3>Связаться с нами</h3>
                <ul class="footer-stay-connected no-list-style">
                    <?= $model->schet ? '<b>P/счет: </b>'. $model->schet.'<br>' : null ?>
                    <?= $model->inn ? '<b>ИНН: </b>'. $model->inn .'<br>': null ?>

                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="footer-copyright">&copy; <?= date('Y')?> www.kotmonstr.com. All rights reserved.</div>
            </div>
        </div>
    </div>
</div>