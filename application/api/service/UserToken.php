<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/3/20
 * Time: 21:49
 */

namespace app\api\service;


use app\lib\exception\TokenException;
use app\lib\exception\WeChatException;
use think\Cache;
use think\Exception;
use app\api\model\User as UserModel;

class UserToken extends Token
{
    protected $code;
    protected $mxAppID;
    protected $mxAppSecret;
    protected $wxLoginUrl;
    function __construct($code)
    {
        $this->code = $code;
        $this->mxAppID = config("wx.app_id");
        $this->mxAppSecret = config("wx.app_secret");
        $this->wxLoginUrl = sprintf(config("wx.login_url)"),$this->mxAppID,$this->mxAppSecret,$this->code);
        //sprintf():把百分号（%）符号替换成一个作为参数进行传递的变量，%s：规定字符串以及字符串格式化其中的变量。
    }

    public function get(){
       $result = curl_get($this->wxLoginUrl);
       $wxResult = json_decode($result,true);//把json类型转化为数组类型
       if(empty($wxResult)){//code码非法的时候$wxResult视为空
           throw new Exception("微信内部错误，获取session_key和openid异常");//服务器内部错误不能把错误原因传到客户端但这要记录日志
       }else{
           $loginFail = array_key_exists("errorcode",$wxResult);//有错误的时候微信会返回errorcode码
           if($loginFail){
                $this->processLoginError($wxResult);
           }else{
                $this->grantToken($wxResult);
           }
       }
    }
    private function processLoginError($wxResult){
        throw new WeChatException([
                "msg" => $wxResult["errmsg"],
                "errorCode" => $wxResult["errorcode"]
            ]

        );
    }
    private function grantToken($wxResult){
        //拿到openid
        //从数据库中拿数据来比较，看openid是否存在
        //如果存在，则不处理；如果不存在，则新增一条user记录
        //生成令牌，准备缓存数据，写入缓存
        //(key:令牌 value:session_key scope uid[openid太长了,UID可以对应唯一的openid] )
        //把令牌返回到返回到客户端
        $openid = $wxResult["openid"];
        $user = UserModel::getByOpenID($openid);
        if($user){
            $uid = $user->id;
        }else{
            $uid = $this->newUser($openid);
        }
        $cacheValue = $this->prepareCacheValue($wxResult,$uid);
        $token = $this->saveToCache($cacheValue);
        return $token;

    }
    private function newUser($openid){
        $user = UserModel::create([
            "openid" => $openid
        ]);
        return $user->id;
    }
    private function prepareCacheValue($wxResult,$uid){
        $cacheValue = $wxResult;
        $cacheValue["uid"] = $uid;
        $cacheValue["scope"] = 16;//scope：作用域 值越大，权限越大，访问接口越多
        return $cacheValue;

    }
    private function saveToCache($cacheValue){
        $key = self::generateToken();//获取token的key值
        $value = json_encode($cacheValue);//数值转换成json数据存储格式
        $expire_in = config("setting.token_expire_in");//获取token过期时间
        $request = \cache($key,$value,$expire_in);
        //TP5缓存默认使用文件系统缓存，可以配置Redis和memcache缓存
        //redis优点：比文件系统速度快，支持存储对象
        if(!$request){
            throw new TokenException([
                "msg" =>"服务器缓存异常",
                "errorCode" => 10005
            ]);
        }
        return $key;
    }
}