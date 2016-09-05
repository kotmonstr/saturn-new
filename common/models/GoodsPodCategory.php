<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "goods_pod_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $descr
 * @property string $slug
 */
class GoodsPodCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods_pod_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'descr'], 'required'],
            [['descr'], 'string'],
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
            'descr' => 'Описание',
            'slug' => 'Slug',
        ];
    }
    public function getName(){
        return $this->name;
    }
}
