<h3>
    Cообщение от <?= ' ' . $name ?>
</h3>
<hr>
<h5>
    Тема: <?= $subject ?>
</h5>
<h5>
    Сообщение: <?= $message ?>
</h5>

<h5>
    <?= Yii::$app->formatter->asDatetime($date, "php:d-m-Y  H:i:s"); ?>

</h5>


