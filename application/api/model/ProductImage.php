<?php
/**
 * Created by PhpStorm.
 * User: Boke
 * Date: 2018/3/27
 * Time: 11:01
 */

namespace app\api\model;


class ProductImage extends BaseModel
{
    protected $hidden = ["product_id","delete_time","img_id"];
    public function imgUrl(){
        return $this->belongsTo("Image","img_id","id");
    }
}