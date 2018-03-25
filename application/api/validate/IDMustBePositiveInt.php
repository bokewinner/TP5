<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/1/24
 * Time: 21:03
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePositiveInt extends BaseValidate
{
    protected  $rule = [
        "id"=>"require|isPositiveInteger"
        //"num"=>"in:1,2,3"
    ];
    protected $message = [
        "id"=>"id必须是正整数"
    ];//修改TP5默认的错误信息

}