<?php
namespace app\components;

use Yii;
use common\models\ImageSlider;
use yii\base\Widget;


class SliderWidget extends Widget
{

    public $model;

    public function init()
    {

        parent::init();

            //$this->model = ImageSlider::find()->all();
            $this->model = ImageSlider::find()->where(['status'=> 0])->all();
        //vd($this->model );

    }
    public function run()
    {
       
        if ($this->model && Yii::$app->params['SLIDER_STATUS'] == 1) {
            echo $this->render('slider', ['model' => $this->model]);
        } else {
            return false;
        }
    }
}