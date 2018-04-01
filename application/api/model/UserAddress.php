<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/4/1
 * Time: 11:30
 */

namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden = ['id','delete_time','user_id'];
}