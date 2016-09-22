<?php

namespace common\models;

use Yii;
use yii\base\BootstrapInterface;
use common\models\Config;
/*
/* The base class that you use to retrieve the settings from the database
*/

class Settings implements BootstrapInterface
{

    private $db;

    public function __construct()
    {
        //$this->db = Yii::$app->db;
    }

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * Loads all the settings into the Yii::$app->params array
     * @param Application $app the application currently running
     */

    public function bootstrap($app)
    {

// Get settings from database
        //$sql = $this->db->createCommand("SELECT setting_name,setting_value FROM settings");
        //$settings = $sql->queryAll();

        $settings = Config::find()->select(['param','value'])->all();

// Now let's load the settings into the global params array

        foreach ($settings as $key => $val) {
            Yii::$app->params[$val['param']] = $val['value'];
        }
    }

}