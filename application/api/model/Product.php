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
    public function imgs(){
        return $this->hasMany("ProductImage","product_id","id");
    }
    public function properties(){
        return $this->hasMany("ProductProperty","product_id","id");
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
    public static function getProductDetail($id){
        //链式查询返回的是Query对象
        $product = self::with([
            "imgs" => function($query){
                $query->with("imgUrl")->order("order","asc");//本模型类中才可以用order方法,而要在关联查询无法使用
            }
        ])
            ->with(["properties"])->find($id);
        return $product;
    }
}