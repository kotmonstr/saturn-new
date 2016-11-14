<?php

namespace common\models;

use Yii;
use common\models\PhotoAlbum;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "gallery".
 *
 * @property integer $id
 * @property string $file_name
 * @property string $file_path
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property integer $text
 */
class Gallery extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => 'yii\behaviors\TimestampBehavior',
            ],
        ];
    }
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'status','album_id'], 'integer'],
            [['file_name', 'file_path','text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'album_id'=> 'Album id',
            'file_name' => 'File Name',
            'file_path' => 'File Path',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'text' => 'Описание',
        ];
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {

            $fullPath = Yii::getAlias('@frontend')  .'/web/upload/multy-big/'.$this->file_name;
            if(file_exists($fullPath)) {
                unlink($fullPath);
            }
            $fullPath2 = Yii::getAlias('@frontend')  .'/web/upload/multy-thumbs/'.$this->file_name;
            if(file_exists($fullPath2)) {
                unlink($fullPath2);
            }
            return true;
        } else {
            return false;
        }
    }

    public function getPhotoAlbum()
    {
        return $this->hasOne(PhotoAlbum::className(), ['id' => 'album_id']);
    }

}
