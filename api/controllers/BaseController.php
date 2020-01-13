<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2020-01-05
 * Time: 18:00
 */

namespace api\controllers;


use api\behaviors\UserAuth;
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
            'class' => UserAuth::className()
        ];
        return $behaviors;
    }



}