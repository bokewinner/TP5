<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/2/2
 * Time: 10:54
 */

namespace app\api\model;


use app\api\validate\IDMustBePositiveInt;

class Product extends BaseModel
{
    protected $hidden = ["delete_time","main_img_id","pivot","from","create_time","category_id","update_time"];
    //pivot:多对多的中间表
    public function getMainImgUrlAttr($value,$data){
        return $this->prefixImgUrl($value,$data);
    }
    public static function getMostRecent($count){
        $product = self::limit($count)->order('create_time desc')->select();//一组数组
        //limit($count)限制长度,order($create_time)通过create_time从小到大排序
        return $product;
    }
    public static function getProductsByCategoryID($categoryID){
        $products = self::where("category_id","=",$categoryID)->select();
        return $products;
    }

}