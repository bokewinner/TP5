<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/3/18
 * Time: 14:48
 */

namespace app\api\model;


class Category extends BaseModel
{
    protected $hidden = ['delete_time','update_time'];
    public function img(){
        return $this->belongsTo('Image',"topic_img_id","id");
    }
}