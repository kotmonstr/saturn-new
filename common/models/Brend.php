<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "brend".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $slug
 */
class Brend extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'description', 'slug'], 'string', 'max' => 255],
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
            'description' => 'Описание',
            'slug' => 'Slug',
        ];
    }
    public function getName()
    {
        return $this->name;
    }
}
