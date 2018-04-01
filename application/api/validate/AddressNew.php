<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/3/31
 * Time: 14:05
 */

namespace app\api\validate;


class AddressNew extends BaseValidate
{
    protected $rule =[
        'name' => 'require|isNotEmpty',
        'mobile' => 'require|isMobile',
        'province' => 'require|isNotEmpty',
        'city' => 'require|isNotEmpty',
        'country' => 'require|isNotEmpty',
        'detail' => 'require|isNotEmpty'
    ];
}