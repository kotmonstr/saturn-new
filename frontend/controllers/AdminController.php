<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Article;
use common\models\Goods;
use common\models\GoodsCategory;
use common\models\ArticleCategory;
use common\models\ImageSlider;
use common\models\Groop;

/**
 * Default controller for the `home` module
 */
class AdminController extends Controller
{
    public $layout = 'admin';

    public $countallArticles = 0;
    public $countallGoods = 0;
    public $countallGoodsCaterory = 0;
    public $countallArticleCaterory = 0;
    public $countAllSliderFotos = 0;
    public $countAllGroop = 0;


    public function actionIndex()
    {
        $this->countallArticles = Article::find()->count();
        $this->countallGoods = Goods::find()->count();
        $this->countallGoodsCaterory = GoodsCategory::find()->count();
        $this->countallArticleCaterory = ArticleCategory::find()->count();
        $this->countAllSliderFotos = ImageSlider::find()->count();
        $this->countAllGroop = Groop::find()->count();

        return $this->render('index');
    }

}


