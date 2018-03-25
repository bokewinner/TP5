<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/1/27
 * Time: 14:38
 */

namespace app\lib\exception;


use Throwable;

class ParameterException extends BaseException
{
    public $code = 400;
    public $msg = "参数错误";
    public $errorCode = 10000;//通用参数错误
    //子类自动继承基类的构造函数
}