<?php

namespace common\models;

use Yii;
use common\models\GoodsCategory;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use common\models\GoodsPodCategory;
use common\models\Exchange;

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
    public $file;
    public $currency;

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
            [['item', 'price', 'category_id', 'descr','units'], 'required'],
            [['category_id','pod_category_id','currency'], 'integer'],
            [['price'], 'double'],
            [['image','slug','pdf','descr'], 'string'],
            [['item','units'], 'string', 'max' => 255],
            //[['image_file'], 'file', 'extensions' => 'gif, jpg,png'],
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
            'slug'=>'slug',
            'currency'=>'Валюта',
            'units'=>'Еденицы измерения',
            'image_file'=>'Картинка'
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
    public static function getCurrs($currency){

        $rates = new Exchange(date("Y-m-d"));
        switch ($currency) {
            case 1:
                $curs = 1;
                break;
            case 2:
                $curs = $rates->GetRate("EUR");
                break;
            case 3:
                $curs = $rates->GetRate("USD");
                break;
        }
        return $curs;
    }



}
