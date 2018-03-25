<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/3/20
 * Time: 21:29
 */

namespace app\api\validate;


class TokenGet extends BaseValidate
{
    protected $rule = [
        "code" => "require|isNotEmpty"
    ];
    protected $message = [
        "code" => "code can not be empty!"
    ];
}