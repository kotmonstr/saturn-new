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
            [['message', 'subject', 'subject', 'user_name','email'], 'required'],
            [['message'], 'string'],
            [['created_at', 'updated_at', 'status','subject'], 'integer'],
            [['email', 'user_name'], 'string', 'max' => 255],
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
