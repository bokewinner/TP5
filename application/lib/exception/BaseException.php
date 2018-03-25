<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/1/26
 * Time: 16:58
 */

namespace app\lib\exception;


use think\Exception;
use Throwable;

class BaseException extends Exception
{
    //http状态码
    public $code = 400;
    public $msg = "参数错误";
    public $errorCode = 10000;
    public function __construct($param = [])
    {
        if(!is_array($param)){
            return ;
            //throw new Exception("数组不存在");
        }
        if(array_key_exists("code",$param)){
            $this->code = $param["code"];
        }
        if(array_key_exists("msg",$param)){
            $this->msg = $param["msg"];
        }
        if(array_key_exists("errorCode",$param)){
            $this->errorCode = $param["errorCode"];
        }
    }
}