<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/1/24
 * Time: 16:09
 */

namespace app\api\validate;


use think\Validate;

class TestValidate extends Validate
{
    protected $rule = [
        "name"=>"require|max:10",
        "email"=>"email"
    ];
}