<?php
namespace frontend\controllers;

use common\models\GoodsPhotos;
use Yii;
use common\models\Goods;
use common\models\GoodsSearch;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;



class GoodsController extends CoreController
{

    public function actionIndex()
    {
        $searchModel = new GoodsSearch();
        $dataProvider = $searchModel->search(['user_id' => Yii::$app->user->id]);
        $dataProvider->pagination->pageSize = Yii::$app->params['ADMIN_ITEMS_PER_PAGE'];

        return $this->render('index', ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]);
    }

    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    public function actionCreate()
    {

        $model = new Goods();
        if ($model->load(Yii::$app->request->post())) {

            $model = $this->changePrice($model);
            $model->status = 1;

            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $model->file->saveAs('upload/pdf/' . $model->file->name);
                $model->pdf = $model->file->name;
            }

            $model->image = Yii::$app->request->post('Goods')['new_image'];
            $model->image_file = Yii::$app->request->post('Goods')['new_image'];

            //$model->validate();
             //vd($model->getErrors());
            if($model->validate() == true && $model->save()){
                Yii::$app->session->setFlash('success', 'Товар успешно создан.');
                return $this->redirect(['view', 'id' => $model->id]);
            }else{

                    return $this->render('create', ['model' => $model,]);

            }



        } else {
            return $this->render('create', ['model' => $model,]);
        }
    }

    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            //vd(Yii::$app->request->post());
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file) {
                $model->file->saveAs('upload/pdf/' . $model->file->name);
                $model->pdf = $model->file->name;
            }

            $model->new_image= UploadedFile::getInstance($model, 'image_file');
            if ($model->new_image) {
                $model->image = $model->new_image->name;
            }
                //$model->save();

            //vd(Yii::$app->request->post());
            //$model->validate();
            //vd($model->getErrors());
            if($model->validate() == true && $model->save()) {
                Yii::$app->session->setFlash('success', 'Товар успешно отредактирован.');
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                //$model->validate();
                //vd($model->getErrors());
            }
        }
            return $this->render('update', ['model' => $model]);

    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Товар успешно удален.');

        return $this->redirect(['/goods/index']);
    }

    protected function findModel($id)
    {
        if (($model = Goods::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSubmit()
    {
        $arrResult = [];
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/goods');
        FileHelper::createDirectory(Yii::getAlias('@frontend') . '/web/upload/goods-crop');
        $model = new Goods();
        if (Yii::$app->request->isPost) {
            $imgObject = UploadedFile::getInstance($model, 'image_file');
            $imgObject->saveAs('upload/goods/' . $imgObject->name);
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

    /***********************************************************************************
     * Функция img_resize()
     * Параметры:
     * $src             - имя исходного файла
     * $dest            - имя генерируемого файла
     * $width, $height  - ширина и высота генерируемого изображения, в пикселях
     ***********************************************************************************/
    function img_resize($src, $dest, $width, $height)
    {
        $new_left = 0;
        $new_top = 0;
        $rgb = 0xFFFFFF;
        $quality = 100;
        if (!file_exists($src)) return false;
        $size = getimagesize($src);  // получение размера изображения
        if ($size === false) return false;
        $format = strtolower(substr($size['mime'], strpos($size['mime'], '/') + 1));
        $icfunc = "imagecreatefrom" . $format;
        if (!function_exists($icfunc)) return false;
        if ($size[0] > $width && $size[1] > $height) {
            if ($size[0] <= $size[1]) {
                $x_crop_size = $width / $size[0];
            } else {
                $x_crop_size = $height / $size[1];
            }
        } else {
            $x_crop_size = 1;
            if ($size[0] < $width) {
                $new_left = floor(($width - $size[0]) / 2);
            }
            if ($size[1] < $height) {
                $new_top = floor(($height - $size[1]) / 2);
            }
        }
        $new_width = $size[0] * $x_crop_size;
        $new_height = $size[1] * $x_crop_size;
        $isrc = $icfunc($src);
        $idest = imagecreatetruecolor($width, $height);
        imagefill($idest, 0, 0, $rgb);
        imagecopyresized($idest, $isrc, $new_left, $new_top, 0, 0,
            $new_width, $new_height, $size[0], $size[1]);
        imagejpeg($idest, $dest, $quality);
        imagedestroy($isrc);
        imagedestroy($idest);
        return true;
    }

    function actionUploadExtraImage()
    {
        $i = 0;
        #arrResult=[];
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $good_id = Yii::$app->request->post('id');
        $model = new Goods();
        if (Yii::$app->request->isPost) {
            $imgObject = UploadedFile::getInstances($model, 'image_file_extra');
            if ($imgObject) {
                foreach ($imgObject as $file) {
                    $i++;
                    if ($i > 5) {
                        $arrResult['limit'] = 'Превышен лимит 5 фотографий';
                        return $arrResult;
                    }
                    $file->saveAs('upload/goods-extra/' . $file->baseName . '.' . $file->extension);
                    $_model = new GoodsPhotos();
                    $_model->good_id = $good_id;
                    $_model->name = $file->baseName . '.' . $file->extension;
                    $_model->save();
                    $i == 1 ? $arrResult['a'] = 'upload/goods-extra/' . $file->baseName . '.' . $file->extension : false;
                    $i == 1 ? $arrResult['a_id'] = $_model->id : false;
                    $i == 2 ? $arrResult['b'] = 'upload/goods-extra/' . $file->baseName . '.' . $file->extension : false;
                    $i == 2 ? $arrResult['b_id'] = $_model->id : false;
                    $i == 3 ? $arrResult['c'] = 'upload/goods-extra/' . $file->baseName . '.' . $file->extension : false;
                    $i == 3 ? $arrResult['c_id'] = $_model->id : false;
                    $i == 4 ? $arrResult['d'] = 'upload/goods-extra/' . $file->baseName . '.' . $file->extension : false;
                    $i == 4 ? $arrResult['d_id'] = $_model->id : false;
                    $i == 5 ? $arrResult['e'] = 'upload/goods-extra/' . $file->baseName . '.' . $file->extension : false;
                    $i == 5 ? $arrResult['e_id'] = $_model->id : false;
                }
                return $arrResult;
            }
        }
    }

    public function changePrice($model)
    {
        $curs = Goods::getCurrs($model->currency);
        $model->price = $model->price * $curs;
        return $model;
    }

    public function actionChangeActivety()
    {
        $arrResult = [];
        $id = Yii::$app->request->post('id');
        $state = Yii::$app->request->post('state');
        //vd($id . ': ' . $state);
        if ($state == 'true') {
            $status = 1;
        } else {
            $status = 0;
        }
        if ($id) {
            $model = Goods::find()->where(['id' => $id])->one();
            $model->status = $status;
            $model->updateAttributes(['status']);
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $arrResult['state'] = $status;
        $arrResult['id'] = $id;
        return $arrResult;
    }
}