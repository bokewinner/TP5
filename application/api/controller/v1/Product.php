<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/2/4
 * Time: 14:59
 */

namespace app\api\controller\v1;


use app\api\validate\Count;
use app\api\model\Product as ProductModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ParameterException;
use app\lib\exception\ProductException;

class Product
{
    public function getRecent($count=15){
        (new Count())->gocheck();
        $products = ProductModel::getMostRecent($count);
        if($products->isEmpty()){//返回的是数据集模型对象
            throw new ProductException();
        }
        //把数组转化为模型对象
        //$collection = collection($products);
        //返回数据类型是模型对象
        $products = $products->hidden(['summary']);
        return $products;
    }
    public function getAllInCategory($id){
        (new IDMustBePositiveInt())->gocheck();
       $products = ProductModel::getProductsByCategoryID($id);
       if($products->isEmpty()){
           throw new ProductException();
       }
       $products = $products->hidden(['summary']);
       return $products;
    }
}