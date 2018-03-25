<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/3/20
 * Time: 14:04
 */

namespace app\api\controller\v1;


use app\api\service\UserToken;
use app\api\validate\TokenGet;

class Token
{
    public function getToken($code=''){
        (new TokenGet())->gocheck();
        $ut = new UserToken($code);//构造函数初始化$code
        $token = $ut->get();
        return [
            "token" => $token
        ];//返回值是数组形式TP5会自动序列化成json格式
    }
}