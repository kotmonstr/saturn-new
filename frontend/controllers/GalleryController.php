<?php
namespace frontend\controllers;

use Yii;
use common\models\Gallery;
use common\models\GallerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\imagine\Image;
use common\models\Photo;
use yii\helpers\FileHelper;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\models\ArticleCategory;
use common\models\Article;
use common\models\Goods;
use common\models\GoodsCategory;
use common\models\GoodsPodCategory;
use common\models\ImageSlider;

class GalleryController extends Controller {

    public $countAllArticles = false;
    public $countAllGoods = false;
    public $countAllGoodsCategory = false;
    public $countAllArticleCategory = false;
    public $countAllSliderFotos = false;
    public $countAllGoodsPodCategory = false;
    public $countAllGalleryPhotos = false;


    public $layout = 'admin';
    public $enableCsrfValidation = false;
    public function actionIndex() {

        $this->getAllCounters();

        $searchModel = new GallerySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionDelete($id) {

        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Фотография удалена');
        return $this->redirect('index');
    }
    protected function findModel($id) {
        if (($model = Gallery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionSubmitMulty() {
//vd(1);
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/multy-big');
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/multy-thumbs');
        $arr = [];
        $i = 0;
        $model = new Gallery();
        $name = date("dmYHis", time());
        if (\yii\web\UploadedFile::getInstances($model, 'file')) {
            $model->file = \yii\web\UploadedFile::getInstances($model, 'file');
            foreach ($model->file as $file) {
                $i++;
                $file->saveAs('upload/multy-big/' . $name . '-' . $i . '.' . $file->extension);
                Image::thumbnail(Yii::getAlias('@frontend') . '/web/upload/multy-big/' . $name . '-' . $i . '.' . $file->extension, 1200, 500)
                    ->save(Yii::getAlias(Yii::getAlias('@frontend') . '/web/upload/multy-thumbs/' . $name . '-' . $i . '.' . $file->extension), ['quality' => 80]);
                $_model = new Gallery();
                $_model->file_name = $name . '-' . $i . '.' . $file->extension;
                $_model->file_path = '/upload/multy-big/';
                //$_model->validate();
                //vd($_model->getErrors());
                $_model->save();
                $arr[] = $name . '-' . $i . '.' . $file->extension;
            }
            Yii::$app->session->setFlash('success', 'Фотография(и) успешно загруженны');
            return $this->redirect('index');

            //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            //return $arr;
        }
    }
    public function actionChangeActivety(){
        $arrResult = [];
        $id= Yii::$app->request->post('id');
        $state= Yii::$app->request->post('state');
        //vd( $id .': ' .$state );
        if($state == 'true'){$status = 1;}else{$status = 0;}
        if($id){
            $model = Gallery::find()->where(['id'=> $id])->one();
            $model->status = $status;
            $model->updateAttributes(['status']);
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $arrResult['state']=$status;
        $arrResult['id']=$id;
        return $arrResult;
    }
    public function actionUpdate($id)
    {
        //vd(1);
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    private function getAllCounters(){
        $this->countAllArticles = Article::find()->count();
        $this->countAllGoods = Goods::find()->count();
        $this->countAllGoodsCategory = GoodsCategory::find()->count();
        $this->countAllArticleCategory = ArticleCategory::find()->count();
        $this->countAllSliderFotos = ImageSlider::find()->count();
        $this->countAllGoodsPodCategory = GoodsPodCategory::find()->count();
        $this->countAllGalleryPhotos = Gallery::find()->count();
    }


}