<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/1/26
 * Time: 17:08
 */

namespace app\lib\exception;


class BannerMissException extends BaseException
{
    public $code = 404;
    public $msg = "请求的Banner不存在";
    public $errorCode = 40000;
}