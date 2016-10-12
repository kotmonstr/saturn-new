<?php
use yii\widgets\Breadcrumbs;

?>

    <section class="content-header">

    </section>

<?php
echo Breadcrumbs::widget([
    'homeLink' => [
        'label' => 'Главная',
        'itemTemplate' => "<li><i>{link}</i></li>\n",
        'url' => ['/admin/index']
    ],
    'links' => [
        [
            'label' => $this->title,
            'itemTemplate' => "<li><i>{link}</i></li>\n",
            //'url' => ['post/edit', 'id' => 1]
        ],

    ],
]);

?>