<?php
namespace frontend\controllers;

use Yii;
use common\models\GoodsCategory;
use common\models\GoodsCategorySearch;
use yii\base\ErrorException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Article;
use common\models\Goods;
use yii\web\ServerErrorHttpException;
use common\models\ArticleCategory;
use common\models\ImageSlider;
use common\models\Groop;
use common\models\Brend;
use common\models\GoodsPodCategory;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * DefaultController implements the CRUD actions for GoodsCategory model.
 */
class GoodsCategoryController extends Controller
{
    public $layout = "admin";

    public $countAllArticles = false;
    public $countAllGoods = false;
    public $countAllGoodsCategory = false;
    public $countAllArticleCategory = false;
    public $countAllSliderFotos = false;
    public $countAllGoodsPodCategory = false;


    /**
     * Lists all GoodsCategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->getAllCounters();

        $searchModel = new GoodsCategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GoodsCategory model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->getAllCounters();


        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new GoodsCategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->getAllCounters();
        $model = new GoodsCategory();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = Yii::$app->request->post('GoodsCategory')['image'];
        }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            Yii::$app->session->setFlash('success', 'Категория товара " ' . $model->name . ' " успешно создана.');
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GoodsCategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->getAllCounters();


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
     * Deletes an existing GoodsCategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //TODO проверить пуста ли категория
        $chekResult = $this->chekCategory($id);

        if ($chekResult) {
            $this->findModel($id)->delete();
            Yii::$app->session->setFlash('success', 'Категория удалена.');
        } else {

            Yii::$app->session->setFlash('danger', 'Категория не пуста - нельзя удалять.');

            //throw new ServerErrorHttpException('Категория не пуста - нельзя удалять.');
        }
        return $this->redirect('index');
    }

    /**
     * Finds the GoodsCategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GoodsCategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GoodsCategory::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    private function chekCategory($id)
    {
        $count = Goods::find()->where(['category_id' => $id])->count();
        //vd($count);
        if ($count) {
            return false;
        } else {
            return true;
        }
    }

    public function actionSubmit()
    {
        $arrResult = [];
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/goods_category');
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/goods_category_crop');
        $model = new GoodsCategory();
        if (Yii::$app->request->isPost) {
            $imgObject = UploadedFile::getInstance($model, 'image_file');
            $imgObject->saveAs('upload/goods_category/' . $imgObject->name);
//TODO Провести валидацию качества картинки
//            Image::thumbnail(Yii::getAlias('@frontend') . '/web/upload/goods/' . $time .  '.' . $imgObject->extension, 1500, 1000)
//                ->save(Yii::getAlias(Yii::getAlias('@frontend') . '/web/upload/goods-crop/' . $time .  '.' . $imgObject->extension), ['quality' => 80]);
//            $originalPath = Yii::getAlias('@app') . '/web/upload/goods/' . $imgObject->name ;
//            $thumbPath = Yii::getAlias('@app') . '/web/upload/goods-crop/' . $imgObject->name;
//            // Создание кропа 738х246
//            $this->img_resize($originalPath,$thumbPath,300,200);
            $arrResult['imageName'] = $imgObject->name;
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return $arrResult;
        }
    }

    private function getAllCounters()
    {
        $this->countAllArticles = Article::find()->count();
        $this->countAllGoods = Goods::find()->count();
        $this->countAllGoodsCategory = GoodsCategory::find()->count();
        $this->countAllArticleCategory = ArticleCategory::find()->count();
        $this->countAllSliderFotos = ImageSlider::find()->count();
        $this->countAllGoodsPodCategory = GoodsPodCategory::find()->count();
    }
}