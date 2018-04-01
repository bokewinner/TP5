<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/3/27
 * Time: 11:05
 */

namespace app\api\model;


class ProductProperty extends BaseModel
{
    protected $hidden = ["product_id","delete_time","id"];
}