<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/1/26
 * Time: 16:23
 */

namespace app\lib\exception;


use Exception;
use think\exception\Handle;
use think\Log;
use think\Request;
//全局异常处理，对所有的异常进行自定义处理
class ExceptionHandler extends Handle
{
    private $code;
    private $msg;
    private $errorCode;
    public function render(Exception $ex)//render方法对传进来的错误异常进行渲染和处理
    {
        //return json("_____-----____----");
        if($ex instanceof BaseException){//自定义异常（用户行为导致的异常）
            $this->code = $ex->code;
            $this->msg = $ex->msg;
            $this->errorCode = $ex->errorCode;
        }else{//服务器异常
            if(config("app_debug")){
                return parent::render($ex);
            }else {
                $this->code = 500;//http请求码
                $this->msg = "Server error!";
                $this->errorCode = 999;//错误码
                $this->recordErrorLog($ex);
            }
        }
        $request = Request::instance();
        $result = [
            "request_url"=>$request->url(),
            "msg"=>$this->msg,
            "errorCode"=>$this->errorCode
        ];
        return json($result,$this->code);
    }
    private function recordErrorLog(Exception $e){
        //在config配置下，因为type="test"，所以需要手动初始化日志
        Log::init([
            'type'=>'File',
            'path'=>LOG_PATH,
            'level'=>['error']//高于error级别的错误才会记录在log
        ]);
        Log::record($e->getMessage(),'error');//type:错误级别
    }
}