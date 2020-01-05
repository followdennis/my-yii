<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-05
 * Time: 18:00
 */

namespace api\controllers;


use yii\filters\auth\QueryParamAuth;
use yii\web\Controller;

class BaseController extends Controller
{

    public function init()
    {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public function behaviors() {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className()
        ];
        return $behaviors;
    }



}