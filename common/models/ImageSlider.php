<?php

namespace common\models;
use Yii;



/**
 * This is the model class for table "{{%images}}".
 *
 * @property string $id
 * @property string $name
 */
class ImageSlider extends \yii\db\ActiveRecord
{
   

    public $file;

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['status',], 'integer'],
            [['name','text'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%image}}';
    }

  


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Имя'),
            'text' => Yii::t('app', 'Текст'),
        ];
    }
    /**
     * return model
     */
    public static function getmodel()
    {
        
        return $model = self::find()->all();
    }
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {

            $fullPath = Yii::getAlias('@frontend')  .'/web/upload/multy-big/'.$this->name;
            if(file_exists($fullPath)) {
                unlink($fullPath);
}
            $fullPath2 = Yii::getAlias('@frontend')  .'/web/upload/multy-thumbs/'.$this->name;
            if(file_exists($fullPath2)) {
                unlink($fullPath2);
}
            return true;
        } else {
            return false;
        }
    }
}
