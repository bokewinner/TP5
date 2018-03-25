<?php

namespace app\api\model;

use think\Model;

class BannerItem extends BaseModel
{
    //
    protected $hidden = ['update_time','delete_time','banner_id','img_id','id'];
    public function img(){
        //Image类附属于BannerItem表
        return $this->belongsTo("Image","img_id","id");
    }
}
