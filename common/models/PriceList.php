<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "price_list".
 *
 * @property integer $id
 * @property string $file_name
 * @property string $path
 * @property string $descr
 * @property integer $created_at
 * @property integer $updated_at
 */
class PriceList extends \yii\db\ActiveRecord
{
    public $file;



    public function behaviors()
    {
        return [
            [
                'class' => 'yii\behaviors\TimestampBehavior',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'price_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [


            [['descr','title','file_name'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['path', 'descr','title'], 'string', 'max' => 255],
            [['file'], 'file', 'skipOnEmpty' => true,'extensions' => 'pdf']


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_name' => 'Файл',
            'title' => 'Имя',
            'path' => 'Path',
            'descr' => 'Описание',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {

            $fullPath = Yii::getAlias('@frontend')  .'/web/upload/pdf/'.$this->file_name;
            if(file_exists($fullPath)) {
                unlink($fullPath);
            }
            return true;
        } else {
            return false;
        }
    }


}
