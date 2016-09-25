<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>

<?php
// $this is the view object currently being used
echo Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Post Category',
            'url' => ['post-category/view', 'id' => 10],
            'template' => "<li><b>{link}</b></li>\n", // template for this link only
        ],
        ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]],
        'Edit',
    ],
]);

?>