<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/3/18
 * Time: 14:47
 */

namespace app\api\controller\v1;
use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;


class Category
{
    public function getAllCategories(){
        $categories = CategoryModel::all([],"img");
        //等价于$categories = CategoryModel::with("img")->select();
        if($categories->isEmpty())
        {
            throw new CategoryException();
        }
        return $categories;
    }
}