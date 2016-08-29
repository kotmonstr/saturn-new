<?php

namespace frontend\controllers;

use Yii;
use common\models\ArticleCategory;
use common\models\ArticleCategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Article;
use common\models\Goods;
use common\models\GoodsCategory;
use common\models\ImageSlider;

/**
 * DefaultController implements the CRUD actions for ArticleCategory model.
 */
class ArticleCategoryController extends Controller
{
    public $layout = 'admin';

    public $countallArticles = 0;
    public $countallGoods = 0;
    public $countallGoodsCaterory = 0;
    public $countallArticleCaterory = 0;
    public $countAllSliderFotos = 0;


    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ArticleCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->countallArticles = Article::find()->count();
        $this->countallGoods = Goods::find()->count();
        $this->countallGoodsCaterory = GoodsCategory::find()->count();
        $this->countallArticleCaterory = ArticleCategory::find()->count();
        $this->countAllSliderFotos = ImageSlider::find()->count();

        $searchModel = new ArticleCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticleCategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->countallArticles = Article::find()->count();
        $this->countallGoods = Goods::find()->count();
        $this->countallGoodsCaterory = GoodsCategory::find()->count();
        $this->countallArticleCaterory = ArticleCategory::find()->count();
        $this->countAllSliderFotos = ImageSlider::find()->count();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ArticleCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->countallArticles = Article::find()->count();
        $this->countallGoods = Goods::find()->count();
        $this->countallGoodsCaterory = GoodsCategory::find()->count();
        $this->countallArticleCaterory = ArticleCategory::find()->count();
        $this->countAllSliderFotos = ImageSlider::find()->count();

        $model = new ArticleCategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ArticleCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->countallArticles = Article::find()->count();
        $this->countallGoods = Goods::find()->count();
        $this->countallGoodsCaterory = GoodsCategory::find()->count();
        $this->countallArticleCaterory = ArticleCategory::find()->count();
        $this->countAllSliderFotos = ImageSlider::find()->count();

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ArticleCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArticleCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArticleCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
