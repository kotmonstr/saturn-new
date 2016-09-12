<?php
namespace app\components;
use yii\base\Widget;
use common\models\Reqvizit;

class FooterWidget extends Widget
{

    public $model;
    public function init()
    {

        parent::init();
            $this->model = Reqvizit::find()->one();
    }
    public function run()
    {
            echo $this->render('footer', ['model' => $this->model]);
    }
}