<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/1/25
 * Time: 10:17
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Route;
use think\Validate;

class BaseValidate extends Validate
{
    protected function isPositiveInteger($value,$rule='',$data='',$field=''){
        if(is_numeric($value) && is_int($value+0) && ($value + 0) > 0)//判断是否是正整数的规则
        {
            return true;
        }else{
            return false;
        }
    }
    public function gocheck(){
        //1.获取http请求参数
        //2.对这些参数进行校验
        $request = Request::instance();
        $params = $request->param();//获取所有http参数请求类型和值
        $result = $this->batch()->check($params);//BaseValidate继承Validate，而this可以指向父类的属性和方法
        if(!$result){
            $e = new ParameterException([
                "msg"=>$this->error
            ]);
            //$e->msg = $this->error;
            throw $e;
            //$error = $this->error;
            //throw new Exception($error);//抛出TP5默认的异常处理
        }else{
            return true;
        }
    }
}