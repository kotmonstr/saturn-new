<?php

namespace app\models;

use Yii;

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
            [['message'], 'string'],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['subject', 'email', 'user_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message' => 'Message',
            'subject' => 'Subject',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_name' => 'User Name',
            'status' => 'Status',
        ];
    }
}
