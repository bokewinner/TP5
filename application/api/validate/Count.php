<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/2/4
 * Time: 15:03
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
     "count" => "IsPositiveInteger|between:1,15"
    ];//require:必须，由于count有取默认值，所以可以不传入count参数
}