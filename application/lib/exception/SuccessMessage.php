<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/1
 * Time: 11:43
 */

namespace app\lib\exception;


class SuccessMessage extends BaseException
{
    public $code = 201;//资源更新成功地http请求
    public $msg = 'ok';
    public $errorCode = 0;
}