<?php

namespace app\models;

use Yii;
use yii\base\Model;


class Geoip extends Model
{
    public  $country;    //страна
    public  $city;       //город
    public  $la;         //широта
    public  $lo;         //долгота


    /**
     * Заполняем модель
     * @param $input
     * @return bool
     */
    public function setData($input=[]) {
        if (is_array($input)) {
            $key = key($input);

            //toDo нужно продумать вопрос вложенных массивов, по сути многомерной конфигурации

            $this->city   = $input[$key][Yii::$app->params['getApi'][$key]['city']];
            $this->country      = $input[$key][Yii::$app->params['getApi'][$key]['country']];
            $this->la        = $input[$key][Yii::$app->params['getApi'][$key]['la']];
            $this->lo        = $input[$key][Yii::$app->params['getApi'][$key]['lo']];


            return TRUE;
        }
        return FALSE;
    }

    public function getData() {
        return [
            'country'=>$this->country,
            'city'=>$this->city,
            'la'=>$this->la,
            'lo'=>$this->lo
        ];
    }


}