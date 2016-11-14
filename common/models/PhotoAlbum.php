<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "Photo_album".
 *
 * @property integer $id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property integer $created_at
 * @property integer $updated_at
 */
class PhotoAlbum extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\behaviors\TimestampBehavior',
            ],
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
        return 'Photo_album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 255],
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
            'slug' => 'Slug',
            'description' => 'Описание',
            'created_at' => 'Дата создания',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return PhotoAlbumQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PhotoAlbumQuery(get_called_class());
    }
    
    public static function getAllAlbum(){
        $model = self::find()->all();
        return $model ? $model : false;
    }

    public static function getIdBySlug($slug){
        $model = self::find()->where(['slug'=> $slug])->one();
        return $model ? $model->id : false;
    }
}
