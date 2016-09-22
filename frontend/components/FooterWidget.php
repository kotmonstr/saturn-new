<?php
namespace app\components;
use common\models\Video;
use yii\base\Widget;
use common\models\Reqvizit;

class FooterWidget extends Widget
{

    public $model;
    public $modelVideo;

    public function init()
    {

        parent::init();
            $this->model = Reqvizit::find()->one();
            $this->modelVideo = Video::find()->orderBy('id DESC')->one();

    }
    public function run()
    {
            echo $this->render('footer', ['model' => $this->model,'modelVideo'=> $this->modelVideo]);
    }
}