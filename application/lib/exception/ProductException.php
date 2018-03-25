<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/2/4
 * Time: 15:29
 */

namespace app\lib\exception;


class ProductException extends BaseException
{
    public $code = 404;
    public $msg = "指定的商品不存在，请检查参数";
    public $errorCode = 20000;//2:商品类错误
}