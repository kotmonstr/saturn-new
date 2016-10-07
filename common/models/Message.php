<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property string $message
 * @property string $subject
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $user_name
 * @property integer $status
 */
class Message extends \yii\db\ActiveRecord
{
    public $reCaptcha;

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
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message','user_name','email'], 'required'],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['subject', 'email', 'user_name','message'], 'string', 'max' => 255],
            ['email', 'email'],
            //[['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className()]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Сообщение',
            'subject' => 'Тема',
            'email' => 'Email',
            'created_at' => 'Отправленно',
            'updated_at' => 'Updated At',
            'user_name' => 'Имя',
            'status' => 'Просмотрено/Непросмотренно',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['message', 'email','user_name','subject'];
        return $scenarios;
    }
}
