<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//return [
//    '__pattern__' => [
//        'name' => '\w+',
//    ],
//    '[hello]'     => [
//        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//        ':name' => ['index/hello', ['method' => 'post']],
//    ],
//
//];
use think\Route;
//TP5的路由设置为：http://servername/model/controller/action[param/value] 模块名/控制器名/操作方法名
//model是application文件下的模块文件,controller是模块文件下的PHP类文件名(若控制器下还有其他文件就文件名.类名),action是类中的方法名
Route::get("api/:version/banner/:id","api/:version.Banner/getBanner");

Route::get("api/:version/theme","api/:version.Theme/getSimpleList");//get不支持传入数组类型，所以用?ids = id1,id2..形式
Route::get("api/:version/theme/:id","api/:version.Theme/getComplexOne");

Route::get("api/:version/product/recent","api/:version.Product/getRecent");
Route::get("api/:version/product/by_category","api/:version.Product/getAllInCategory");
Route::get("api/:version/product/:id","api/:version.Product/getOne",[],['id'=>'\d+']);
//Route::group("api/:version/product",function(){
//    Route::get("/recent","api/:version.Product/getRecent");
//    Route::get("/by_category","api/:version.Product/getAllInCategory");
//    Route::get("/:id","api/:version.Product/getOne",[],['id'=>'\d+']);
//});

Route::get("api/:version/category/all","api/:version.Category/getAllCategories");

Route::post("api/:version/token/user","api/:version.Token/getToken");

Route::post("api/:version/address","api/:version.Address/createOrUpdateAddress");
//Route::rule("路由表达式","路由地址",“请求类型”,“路由参数（数组）”,“变量规则（数组）”);
//请求类型：get post delete put *（所有http请求类型）
//Route::rule('boke','sample/Test/hello','GET|POST',['https'=>false]);
//Route::post("bokewinner/:id/:name/:age","sample/Test/hello");
//Route::any()=>*