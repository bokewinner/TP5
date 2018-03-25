<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/1/23
 * Time: 14:43
 */

namespace app\sample\controller;
use think\Db;
use think\Request;

class Test
{
    public function hello(Request $request){
//        $id = Request::instance()->param("id");
//        $name = Request::instance()->param("name");
//        $age = Request::instance()->param("age");
//        echo $id."|".$name."|".$age;
//        $all = Request::instance()->post();
//        $all = $request->param();
        $all = input("param.");
        var_dump($all);
    }
}