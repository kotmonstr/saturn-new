<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use common\models\GoodsPodCategory;

/**
 * This is the model class for table "goods_category".
 *
 * @property integer $id
 * @property integer $pod_category_id
 * @property string $name
 * @property string $descr
 * @property string $slug
 * @property string $image
 * @property string $image_path
 */
class GoodsCategory extends \yii\db\ActiveRecord
{
    public $image_file;
    public $path = '/upload/goods_category/';

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'descr','slug','image'], 'required'],
            [['descr'], 'string'],
            [['name', 'slug', 'image', 'image_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'descr' => 'Описание',
            'slug' => 'Slug',
            'image' => 'Логотип',
            'image_path' => 'Image Path',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getName()
    {
        return $this->name;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Place your custom code here
        $this->image_path = $this->path;
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoods_category()
    {
        return $this->hasOne(GoodsPodCategory::className(), ['category_id'=>'id']);
    }


}
