<?php
namespace frontend\controllers;

use common\models\Article;
use common\models\ArticleCategory;
use common\models\Gallery;
use common\models\Goods;
use common\models\GoodsCategory;
use common\models\Pages;
use common\models\PriceList;
use common\models\Reqvizit;
use common\models\Video;
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
use yii\data\Pagination;
use common\models\GoodsPodCategory;
use common\models\Message;
use yii\web\Response;


/**
 * Site controller
 */
class SiteController extends Controller
{
    const SERVICE = 12;
    const SECRET_CAPTCHA = '6Ld8OQcUAAAAAMitn5QDeWijahsmWXyYH9akEcOq';

    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout', 'signup'],
//                'rules' => [
//                    [
//                        'actions' => ['signup'],
//                        'allow' => true,
//                        'roles' => ['?'],
//                    ],
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
//            'verbs' => [
//                'class' => VerbFilter::className(),
//                'actions' => [
//                    'logout' => ['post','get'],
//                ],
//            ],
//        ];
//    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        $modelMyWorks = Article::find()->where(['article_category' => 12])->limit(6)->all();
        return $this->render('index',
            [
                'modelMyWorks' => $modelMyWorks
            ]
        );
    }

    public function actionGallery()
    {
        $this->layout = 'gallery';

        $query = Gallery::find();

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize'=>Yii::$app->params['GALLARY_PER_PAGE'] ? Yii::$app->params['GALLARY_PER_PAGE'] : 6 ]);

        $model = $query->offset($pages->getOffset())
            ->limit($pages->getLimit())
            ->where(['status' => 1])
            ->all();

        return $this->render('gallery',
            [
                'model' => $model,
                'pages'=> $pages,
            ]
        );
    }

    public function actionArticleDetail($id)
    {
        $this->layout = 'goods';
        
        $model = Article::find()->where(['id' => $id])->one();

        $modelArticleLast = Article::find()
            ->where(['article_category' => self::SERVICE])
            ->limit(9)
            ->orderBy('id DESC')
            ->all();

        $modelCategory = ArticleCategory::find()->limit(10)->all();

        
        return $this->render('article-detail',
            [
                'model' => $model,
                'modelArticleLast' => $modelArticleLast,
                'modelCategory'=> $modelCategory
            ]
        );
    }

    public function actionService()
    {
        $this->layout = 'goods';

        $pageSize = 12;
        $query = Article::find()->where(['article_category' => 12]);

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'defaultPageSize' => Yii::$app->params['SERVICE_PER_PAGE'] ? Yii::$app->params['SERVICE_PER_PAGE'] : 6 ]);

        $model = $query->offset($pages->offset)
            ->orderBy('created_at DESC')
            ->limit($pages->limit)
            ->all();

        return $this->render('service', [
            'model' => $model,
            'pages' => $pages,
            'pageSize' => $pageSize,

        ]);


    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'goods';

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $this->layout = 'goods';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $this->layout = 'goods';
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout = 'goods';

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionGoods()
    {
        $this->layout = 'goods';

        $pod_category_id = Yii::$app->request->get('pod_category_id');
        $pod_cat_name = Yii::$app->request->get('pod_cat_name');
        $cat = Yii::$app->request->get('cat');
        $cat_name = Yii::$app->request->get('cat_name');
        $item = Yii::$app->request->get('item');

        $modelGoodsCategory = GoodsCategory::find()
//            ->leftJoin('goods_pod_category', '`goods_pod_category`.`id` = `goods_category`.`id`')
//            //->where(['=','goods.status', 1])
//            ->where(['<>','goods_pod_category.name' ,44])
//            ->with('goods_category')
            ->all();

        $modelGoodsPodCategory = GoodsPodCategory::find()->all();


        $query = Goods::find();

        if( $pod_category_id) {
            $query = $query->orderBy('created_at DESC')
                            ->where(['status' => 1, 'pod_category_id' => $pod_category_id,]);
        }
        elseif( $item){
            $query = $query
                ->orderBy('created_at DESC')
                ->where(['status'=> 1])
                ->andWhere(['like', 'item', $item]);
        }else{
            $query = $query->orderBy('created_at DESC')
                ->where(['status'=> 1]);
        }

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize'=> Yii::$app->params['GOODS_PER_PAGE'] ? Yii::$app->params['GOODS_PER_PAGE'] : 12]);

        $model = $query->offset($pages->getOffset())
                        ->limit($pages->getLimit())
                        ->all();


        return $this->render('goods', [
            'model' => $model,
            'pages' => $pages,
            'modelGoodsCategory' => $modelGoodsCategory,
            'modelGoodsPodCategory' => $modelGoodsPodCategory,
            'pod_category_id' => $pod_category_id ? $pod_category_id : null,
            'pod_cat_name' => $pod_cat_name,
            'cat'=>$cat,
            'cat_name'=> $cat_name
        ]);
    }

    public function actionGoodsDetail($slug)
    {

        $this->layout = 'goods-detail';

        $model = Goods::find()->where(['slug' => $slug])->one();
        return $this->render('goods-detail', [
            'model' => $model,
        ]);
    }

    public function actionGetPodCatsByCategory()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->post('id');// category_id
        $model = GoodsPodCategory::find()->where(['category_id' => $id])->all();
        return $this->renderAjax('dropdown',['model' => $model]);
    }

    public function actionContactUs(){

        $this->layout = 'goods-detail';

        $model = new Message();
        $modelReqvizit = Reqvizit::find()->one();

        if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    $model->save(false);
                    Yii::$app->session->setFlash('success', 'Ваше сообщение отправленно.');
                    return $this->refresh();
                }
        }

        return $this->render('contact-us', [
            'model'=>$model,
            'modelReqvizit'=> $modelReqvizit
        ]);
    }

    public function actionPage($slug){
        $this->layout = 'goods-detail';
        $model = Pages::find()->where(['slug' => $slug])->one();
        return $this->render('page', [
            'model' => $model,
        ]);
    }

    public function actionArticle()
    {
        $this->layout = 'goods-detail';

        $modelLast = Article::find()->orderBy('created_at DESC')->limit(10)->all();
        $modelCategory = ArticleCategory::find()->limit(10)->all();
        $category_id = Yii::$app->request->get('category_id');
        $query = Article::find();

        if( $category_id) {
            $query = $query->orderBy('created_at DESC')
                ->where(['article_category' => $category_id]);
        }else{
            $query = $query->orderBy('created_at DESC');
            $model = Article::find()->all();
        }
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize'=>  Yii::$app->params['BLOG_PER_PAGE'] ? Yii::$app->params['BLOG_PER_PAGE'] : 12]);

        $model = $query->offset($pages->getOffset())
            ->limit($pages->getLimit())
            ->all();


        $current_month = date('m');
        for ($i = 0; $i >= -5; $i--) {
            $monthList[] = date("F",mktime(0, 0, 0, $current_month + $i, 1, date("Y"))).' '.date("Y");
        }
//vd($monthList);



        return $this->render('article',[
            'model' => $model,
            'pages'=> $pages,
            'modelLast'=> $modelLast,
            'modelCategory'=> $modelCategory,
            'monthList'=> $monthList
            ]);
    }

    public function actionVideo(){

        $this->layout = 'gallery';

        $query = Video::find();

        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'defaultPageSize'=> Yii::$app->params['VIDEO_PER_PAGE'] ? Yii::$app->params['VIDEO_PER_PAGE'] : 12]);

        $model = $query->offset($pages->getOffset())
            ->limit($pages->getLimit())
            ->orderBy('id DESC')
            ->all();

        return $this->render('video',[
            'model' => $model,
            'pages'=> $pages,
        ]);
    }

    public function actionPriceList()
    {

        $this->layout = 'goods-detail';
        $model = PriceList::find()->all();

        return $this->render('price-list', [
            'model' => $model,
        ]);
    }

}
