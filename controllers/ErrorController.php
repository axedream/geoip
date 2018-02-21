<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class ErrorController extends Controller
{
    public $layout=false;

    public function actionError(){
        Yii::$app->response->statusCode = 404;
        return false;
    }

    public function actionDefault()
    {
        Yii::$app->response->statusCode = 404;
        return false;
    }
}