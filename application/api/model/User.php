<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/3/20
 * Time: 21:44
 */

namespace app\api\model;


class User extends BaseModel
{
    public static function getByOpenID($openid){
       $user = self::where("open_id","=",$openid)->find();
       return $user;
    }
}