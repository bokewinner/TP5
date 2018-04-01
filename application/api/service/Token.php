<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/3/24
 * Time: 14:09
 */

namespace app\api\service;


use app\lib\exception\TokenException;
use think\Cache;
use think\Request;

class Token
{
    public static function generateToken(){
        //32个字符组成的一组随机字符串
        $randChars = getRandChars(32);
        //用三组字符串进行md5加密
        $timestamp = $_SERVER['REQUEST_TIME_FLOAT'];
        //salt 加盐
        $salt = config("secure.token_salt");
        return md5($randChars.$timestamp.$salt);
    }
    public static function getCurrentTokenVar($key){
        $token = Request::instance()->header('token');//获取http请求头部信息中的token令牌[约定token放在http请求的头部信息]
        //Request是全局变量
        $var = Cache::get($token);
        if(!$var){
            throw new TokenException();
        }else{
            if(!is_array($var)){
                $var = json_decode($var,true);
            }
            if(array_key_exists($key,$var)){
                return $var[$key];
            }else{
                throw new \Exception('尝试获取Token变量不存在');
            }

        }
    }
    public static function getCurrentUid(){
        //token
        $uid = self::getCurrentTokenVar('uid');
        return $uid;
    }
}