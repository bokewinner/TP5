<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/2/2
 * Time: 17:24
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = "指定的主题不存在，请检查主题ID";
    public $errorCode = 30000;//请求的主题不存在 3:主题类错误
}