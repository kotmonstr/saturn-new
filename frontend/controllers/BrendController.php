<?php

namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Brend;
use common\models\Article;
use common\models\Goods;
use common\models\GoodsCategory;
use common\models\ArticleCategory;
use common\models\ImageSlider;
use common\models\Groop;

/**
 * BrendController implements the CRUD actions for brend model.
 */
class BrendController extends Controller
{
    public $layout = 'admin';

    public $countallArticles = false;
    public $countallGoods = false;
    public $countallGoodsCaterory = false;
    public $countallArticleCaterory = false;
    public $countAllSliderFotos = false;
    public $countAllGroop = false;
    public $countAllBrend = false;

    /**
     * @inheritdoc
     */
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
     * Lists all brend models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->countallArticles = Article::find()->count();
        $this->countallGoods = Goods::find()->count();
        $this->countallGoodsCaterory = GoodsCategory::find()->count();
        $this->countallArticleCaterory = ArticleCategory::find()->count();
        $this->countAllSliderFotos = ImageSlider::find()->count();
        $this->countAllGroop = Groop::find()->count();
        $this->countAllBrend = Brend::find()->count();

        $dataProvider = new ActiveDataProvider([
            'query' => brend::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single brend model.
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
        $this->countAllGroop = Groop::find()->count();
        $this->countAllBrend = Brend::find()->count();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new brend model.
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
        $this->countAllGroop = Groop::find()->count();
        $this->countAllBrend = Brend::find()->count();

        $model = new brend();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing brend model.
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
        $this->countAllGroop = Groop::find()->count();
        $this->countAllBrend = Brend::find()->count();

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
     * Deletes an existing brend model.
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
     * Finds the brend model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return brend the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = brend::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
