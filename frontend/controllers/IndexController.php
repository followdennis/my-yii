<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/12
 * Time: 13:34
 */

namespace frontend\controllers;


use yii\web\Controller;

class IndexController extends Controller
{

    public function actionIndex(){
        echo 'index web';
    }

    public function actionSetCache(){
        $redis = \Yii::$app->redis;
        $redis->set('name','xiaoming');
        echo 'ok';

    }
    public function actionGetCache(){
        $redis = \Yii::$app->redis;
        $name = $redis->get('name');
        echo $name;
    }
}