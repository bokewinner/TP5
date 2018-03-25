<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/3/24
 * Time: 16:33
 */

namespace app\lib\exception;


class TokenException extends BaseException
{
    public $code = 401;
    public $msg = "token已过期或token无效";
    public $errorCode = 10001;
}