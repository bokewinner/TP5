<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    //
    protected function prefixImgUrl($value,$data){
        //读取器，读取虚拟域名并拼接URL($data是获取字段名的数组，$value是字段名所对应的值)
        //获取器方法的第二个参数传入的是当前的所有数据数组
        $finalUrl = $value;
        if($data['from'] == 1){
            $finalUrl = config("setting.img_prefix").$value;
        }
        return $finalUrl;

    }
}
