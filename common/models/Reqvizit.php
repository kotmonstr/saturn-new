<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "reqvizit".
 *
 * @property integer $id
 * @property string $company_name
 * @property string $country
 * @property string $address
 * @property string $mobile
 * @property string $fax
 * @property string $email
 * @property string $schet
 * @property string $inn
 * @property integer $zip_code
 */
class Reqvizit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reqvizit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_name', 'country', 'address', 'mobile'], 'required'],
            [['zip_code'], 'integer'],
            [['company_name', 'country', 'mobile', 'fax'], 'string', 'max' => 100],
            [['address', 'email', 'schet', 'inn'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Имя компании',
            'country' => 'Страна',
            'address' => 'Адрес',
            'mobile' => 'моб телефон',
            'fax' => 'Fax',
            'email' => 'Email',
            'schet' => 'Счет',
            'inn' => 'Инн',
            'zip_code' => 'Почтовый код',
        ];
    }

    public static function getPhoneNumber(){
        $model  = self::find()->select(['mobile'])->where(['id'=> 1])->one();
            return $model->mobile ? $model->mobile : false;
    }
}
