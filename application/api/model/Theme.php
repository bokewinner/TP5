<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/2/2
 * Time: 10:55
 */

namespace app\api\model;


class Theme extends BaseModel
{
    protected $hidden = ["update_time","delete_time","topic_img_id","head_img_id"];
    public function topicImg(){
        return $this->belongsTo("Image","topic_img_id","id");
    }
    public function headImg(){
        return $this->belongsTo("Image","head_img_id","id");
    }
    public function products(){
        //多对多关系
        return $this->belongsToMany("Product","theme_product","product_id","theme_id");
    }
    public static function getThemeWithProducts($id){
        $theme = self::with("products,topicImg,headImg")->find();
        return $theme;
    }
}