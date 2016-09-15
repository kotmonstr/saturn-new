<?php
namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use common\models\Config;
use common\models\Article;
use common\models\Goods;
use common\models\GoodsCategory;
use common\models\ArticleCategory;
use common\models\ImageSlider;
use common\models\GoodsPodCategory;
use common\models\Gallery;
use common\models\Message;

class CoreController extends Controller {

    public $layout = 'admin';

    public $countAllArticles = false;
    public $countAllGoods = false;
    public $countAllGoodsCategory = false;
    public $countAllArticleCategory = false;
    public $countAllSliderFotos = false;
    public $countAllGoodsPodCategory = false;
    public $countAllGalleryPhotos = false;
    public $countAllMessage = false;

    protected $data = array();

    public function init()
    {
        $items = Config::find()->all();
        foreach ($items as $item){
            if ($item->param)
                $this->data[$item->param] = $item->value === '' ?  $item->default : $item->value;
        }
        $this->getAllCounters();
        parent::init();
    }

    private function getAllCounters(){
        $this->countAllArticles = Article::find()->count();
        $this->countAllGoods = Goods::find()->count();
        $this->countAllGoodsCategory = GoodsCategory::find()->count();
        $this->countAllArticleCategory = ArticleCategory::find()->count();
        $this->countAllSliderFotos = ImageSlider::find()->count();
        $this->countAllGoodsPodCategory = GoodsPodCategory::find()->count();
        $this->countAllGalleryPhotos = Gallery::find()->count();
        $this->countAllMessage = Message::find()->count();
    }
}