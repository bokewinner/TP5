<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/1/24
 * Time: 15:00
 */

namespace app\api\controller\v2;
use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\BannerMissException;
use think\Exception;

class Banner
{
    /*
     * 获取指定id的banner信息
     * @id banner的id号
     * @URL banner/:id
     * @http get
     * */
    public function getBanner($id){
        return "this is v2 version";
    }
}