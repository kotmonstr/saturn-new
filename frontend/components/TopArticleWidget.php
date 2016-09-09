<?php
namespace app\components;
use yii\base\Widget;
use common\models\Article;

class TopArticleWidget extends Widget
{

    public $model;

    public function init()
    {

        parent::init();
            $this->model = Article::find()
                ->orderBy('id DESC')
                ->limit(3)
                ->all();

    }
    public function run()
    {
        if ($this->model) {
            echo $this->render('top-article', ['model' => $this->model]);
        } else {
            return false;
        }
    }
}