<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/3/18
 * Time: 15:16
 */

namespace app\lib\exception;


class CategoryException extends BaseException
{
    public $code = 404;
    public $msg = "指定类目不存在,请检查参数";
    public $errorCode = 50000;
}