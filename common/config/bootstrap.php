<?php

function vd($var, $exit = true)
{
    \yii\helpers\BaseVarDumper::dump($var, 10, true);
    if ($exit) {
        exit;
    }
}

Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@pdf', dirname(dirname(__DIR__)) . '/frontend/web/upload/pdf/');
