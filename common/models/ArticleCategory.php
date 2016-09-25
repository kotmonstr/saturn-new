<?php

namespace common\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "article_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @property string $image
 * @property string $image_path
 */
class ArticleCategory extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
            ],
        ];
    }
    public static function tableName()
    {
        return 'article_category';
    }

    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['name', 'slug'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'description' => 'Описание',
            'slug' => 'Slug',
        ];
    }

    public function getArticle()
    {
        return $this->hasMany(Article::className(), ['article_category' => 'id']);
    }


    public static function find()
    {
        return new TemplateQuery(get_called_class());
    }
    
    public static function is_CatecoryFull($id){
        $countArticles = Article::find()->where(['article_category'=> $id])->count();
        return $countArticles > 0 ? false : true;
    }
}
