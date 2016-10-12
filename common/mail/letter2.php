<h3>
    Ух ты кто то на сайте по адресу <?= $controller.'/'. $action ?>
</h3>
<hr>
<h5>
    Тема: <?= $subject ?>
</h5>
<h5>
    userHost: <?= $userHost ?><br>
    userIP: <?= $userIP ?>
</h5>
<h5>
    Сообщение: <?= $message ?>
</h5>

<h5>
    <?= Yii::$app->formatter->asDatetime($date, "php:d-m-Y  H:i:s"); ?>

</h5>


