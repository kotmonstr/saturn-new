<?php
namespace app\components;
use yii\base\Widget;
use common\models\Goods;

class TopGoodsWidget extends Widget
{

    public $model;

    public function init()
    {

        parent::init();
            $this->model = Goods::find()
                ->where(['status'=> 1])
                ->orderBy('id DESC')
                ->limit(3)
                ->all();

    }
    public function run()
    {
        if ($this->model) {
            echo $this->render('top-goods', ['model' => $this->model]);
        } else {
            return false;
        }
    }
}