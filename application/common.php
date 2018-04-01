<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/*
 * @param string $url get请求地址
 * @param int $httpCode 返回状态码
 * @return mixed
 * */
//发送http请求访问去URL
function curl_get($url,$httpCode = 0){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);//需要获取的URL地址
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);//将curl_exec()获取的信息以文件流的形式返回，而不是直接输出
    //不做证书校验，部署在Linux环境下请改为true
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,10);
    $file_contents = curl_exec($ch);
    curl_close($ch);
    return $file_contents;
}
function getRandChars($length){
    $str = null;
    $strPol = "ABCDEFGHIJKLMNOPQRSTUVWSYZ0123456789abcdefghijklmnopqrstuvwsyz";
    $max = strlen($strPol)-1;
    for($i = 0;$i < $length;$i++){
        $str .= $strPol[rand(0,$max)];
    }
    return $str;

}