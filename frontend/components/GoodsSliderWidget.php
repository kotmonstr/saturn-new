<?php
namespace app\components;
use common\models\Goods;
use yii\base\Widget;


class GoodsSliderWidget extends Widget
{

    public $model;

    public function init()
    {

        parent::init();

        $this->model = Goods::find()->where(['status'=>1])->limit(10)->all();

    }
    public function run()
    {
        if ($this->model) {
            echo $this->render('goods-slider', ['model' => $this->model]);
        } else {
            return false;
        }
    }
}