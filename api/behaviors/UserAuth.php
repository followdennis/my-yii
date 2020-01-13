<?php
namespace api\behaviors;
use yii\filters\auth\AuthMethod;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/1/12
 * Time: 18:00
 */

class UserAuth extends AuthMethod
{
    public $tokenParam = 'access-token';

    public function authenticate($user, $request, $response){
        // 请求参数中获取，如果没有则从header中获取
        $accessToken = $request->get($this->tokenParam);
        if( $accessToken){
            if (is_string($accessToken)) {
                $identity = $user->loginByAccessToken($accessToken, get_class($this));
                if ($identity !== null) {
                    return $identity;
                }
            }
        } else {
            $header = $request->headers;
            $accessToken = $header['access-token'];
            $identity = $user->loginByAccessToken($accessToken,get_class($this));
            if( $identity != null){
                return $identity;
            }
        }

        if ($accessToken !== null) {
            $this->handleFailure($response);
        }
        return null;
    }
}