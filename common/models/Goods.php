<?php

namespace common\models;

use Yii;
use common\models\GoodsCategory;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use common\models\GoodsPodCategory;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property string $item
 * @property integer $price
 * @property integer $category_id
 * @property integer $quantity
 * @property string $descr
 * @property integer $status
 * @property integer $rating
 */
class Goods extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_DESABLE = 0;


    public $image_file;
    public $image_file_extra;
    public $new_image;
    //public $pdf_file;
    public $file;
    //public $groop_id;

    public function behaviors()
    {
        return [
            [
                'class' => 'yii\behaviors\TimestampBehavior',
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'item',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item', 'price', 'category_id', 'descr', 'status','new_image','pod_category_id'], 'required'],
            [['category_id', 'status','pod_category_id'], 'integer'],
            [['price'],'double'],
            [['descr', 'image','slug','pdf'], 'string'],
            [['item'], 'string', 'max' => 255],
            [['image_file'], 'file', 'extensions' => 'gif, jpg,png'],
            //[['pdf_file'], 'file', 'skipOnEmpty' => false,'extensions' => 'pdf'],
            //[['file'], 'file','extensions' => 'pdf'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item' => 'Имя',
            'price' => 'Цена',
            'category_id' => 'Категория товара',
            'pod_category_id' => 'Подкатегория',
            'pdf' => 'Pdf file',
            'descr' => 'Описание',
            'status' => 'Показывать/Спрятать',
            'image' => 'Картинка',
            'brend_id' => 'Бренд',
            'rating'=>'Рейтинг',
            'slug'=>'slug'
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->pdf_file->saveAs('/upload/pdf/' . $this->pdf_file->baseName . '.' . $this->pdf_file->extension);
            return true;
        } else {
            return false;
        }
    }


    /*
     * Вернет несколько последних товаров
     */
    public static function getNewest($q = 6)
    {
        $model = self::find()
            ->where(['status' => self::STATUS_ACTIVE])
            ->orderBy('id DESC')
            ->all();
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }



    /*
     * Вернет один товар
     */
    public static function getItemById($id)
    {
        $model = self::find()->where(['id' => $id])->one();
        if ($model) {
            return $model;
        } else {
            return false;
        }
    }

    /*
     * Вернет цену товара
     */
    public static function getPriceById($id)
    {

        $model = self::find()->where(['id' => $id])->one();
        if ($model) {
            return $model->price;
        } else {
            return false;
        }
    }

    /*
  * Вернет категорию товара
  */
    public static function getCategoryById($id)
    {
        $model = self::find()->where(['id' => $id])->one();
        if ($model) {
            return $model->category_id;
        } else {
            return false;
        }
    }



    /*
* Вернет товары этой категории
*/
    public static function getGoodsByCategoriId($id)
    {
        if ($id != 0) {
            $model = self::find()
                ->where(['category_id' => $id,'status' => self::STATUS_ACTIVE])
                ->all();
        } else {
            $model = self::find()->all();
        }

        if ($model) {
            return $model;
        } else {
            return false;
        }
    }





  /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(GoodsCategory::className(), ['id' => 'category_id']);
    }

    public function getPodcategory()
    {
        return $this->hasOne(GoodsPodCategory::className(), ['id' => 'pod_category_id']);
    }

    public function getName(){
        return $this->name;
    }



}
