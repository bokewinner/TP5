<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/3/21
 * Time: 23:23
 */

namespace app\lib\exception;


class WeChatException extends BaseException
{
    public $code = 400;
    public $msg = "微信服务器接口调用失败";
    public $errorCode = 999;
}