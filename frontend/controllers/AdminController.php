<?php

namespace frontend\controllers;


/**
 * Default controller for the `home` module
 */
class AdminController extends CoreController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

}


