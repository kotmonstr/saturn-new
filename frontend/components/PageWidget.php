<?php
namespace app\components;
use common\models\Pages;
use yii\base\Widget;


class PageWidget extends Widget
{

    public $model;

    public function init()
    {

        parent::init();

        $this->model = Pages::find()->where(['status'=>1])->all();

    }
    public function run()
    {
        if ($this->model) {
            echo $this->render('page', ['model' => $this->model]);
        } else {
            return false;
        }
    }
}