<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class ApiController extends Controller
{
    public $token = '12121212121212';

    public function actionTaskCreate()
    {
        $settings = [
            'token' => $this->token,
              'url' => 'http://144.76.33.130/api/v2/tasks/create',
          'options' => ['resolution'=>'1280x720']
        ];
        $this->Curl($settings);
    }

    private function Curl($settings)
    {

        $url = $settings['url'];
        $options = $settings['options'];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, "options=".$options) ;
        $output = curl_exec($ch);
        curl_close($ch);

        echo $output;
    }

}


