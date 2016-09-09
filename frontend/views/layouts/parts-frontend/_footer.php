<?
use yii\helpers\Url;
?>


<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-footer col-md-3 col-xs-6">
                <h3>Наши последние работы</h3>
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <a href="page-portfolio-item.html"><img src="/PURPOSE/img/portfolio6.jpg" alt="Project Name"></a>
                    </div>
                </div>
            </div>
            <div class="col-footer col-md-3 col-xs-6">
                <h3>Страницы</h3>
                <ul class="no-list-style footer-navigate-section">
                    <li><a href="<?= Url::to('/site/goods'); ?>">Товары</a></li>
                    <li><a href="<?= Url::to('/site/service'); ?>">Услуги</a></li>
                    <li><a href="<?= Url::to('/site/gallery'); ?>">Галерея</a></li>
                    <li><a href="<?= Url::to('/site/about'); ?>">О Нас</a></li>
                    <li><a href="#">Site map</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

            <div class="col-footer col-md-4 col-xs-6">
                <h3>Контактные данные</h3>
                <p class="contact-us-details">
                    <b>Address:</b> 123 Fake Street, LN1 2ST, London, United Kingdom<br/>
                    <b>Phone:</b> +44 123 654321<br/>
                    <b>Fax:</b> +44 123 654321<br/>
                    <b>Email:</b> <a href="mailto:getintoutch@yourcompanydomain.com">getintoutch@yourcompanydomain.com</a>
                </p>
            </div>
            <div class="col-footer col-md-2 col-xs-6">
                <h3>Связаться с нами</h3>
                <ul class="footer-stay-connected no-list-style">
                    <li><a href="#" class="facebook"></a></li>
                    <li><a href="#" class="twitter"></a></li>
                    <li><a href="#" class="googleplus"></a></li>
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