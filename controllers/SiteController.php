<?php

namespace app\controllers;

use app\models\Geoip;
use app\models\Rqt;
use Yii;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{

    /**
     * Обработка ошибок
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'error/error',
            ],
        ];
    }

    /**
     * Загрузка данных в модель
     * @param $model
     * @param $key
     * @param $value
     * @return bool
     */
    private function setAttr($model,$key,$value){
        if ($model instanceof Rqt) {
            $model->$key = $value;
            if ($model->validate($key)) return TRUE;
        }
        return FALSE;
    }

    /**
     * Получаем ip даресс
     * @return array|bool|mixed
     */
    public function getIp(){
        if (Yii::$app->request->get('ip')) {
            return Yii::$app->request->get('ip');
        }
        return FALSE;
    }


    /**
     * Обработка запроса
     * @return array|bool
     */
    public function actionIndex()
    {
        if (Yii::$app->request->isGet) {
            $model = new Rqt();
            $ip = $this->getIp();
            if ($this->setAttr($model,'ip',$ip)) {
                $outData = $model->getCacheData($ip);
                if ($outData) {
                    //прогоним данные через модель, что бы получить необходимую форму выдачи
                    $obj_data = new Geoip();
                    if ($obj_data->setData($outData)) {
                        Yii::$app->response->format = Response::FORMAT_JSON;
                        return $obj_data->getData();
                    }

                }

            }
        }
        //Если ничего не найдено вернет 404
        Yii::$app->response->statusCode = 404;
        return false;
    }



}
