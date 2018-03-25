<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/1/24
 * Time: 15:00
 */

namespace app\api\controller\v1;
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
    //独立验证 做验证器
        (new IDMustBePositiveInt())->gocheck();
        $banner = BannerModel::getBannerByID($id);
        //$banner->visible(['id']);
        // $data = $banner->toArray();//获取$banner对象中的data属性，以数组的形式获取
        //$banner->hidden(['delete_time','items.delete_time','img.delete_time']);
        //$banner = BannerModel::with(['items','items.img'])->find($id);
        //get find:查一个记录 select all:查一组记录
        //$banner->hidden(['update_time']);
        if(!$banner){
            throw new BannerMissException();
            //throw new Exception('内部错误');
        }
        return $banner;
        //unset($data['delete_time']);//隐藏delete_time这个字段
        //return $data;
        /*try{
            $banner = BannerModel::getBannerByID($id);
        }catch(Exception $ex){
            $error = [
                'error_code'=>10001,
                'msg'=>$ex->getMessage()
            ];
            return json($error,400);
        }

        return $banner;*/
        //    $c = 1;
 /*       $data = [
//            "name"=>"vendor1234567",
//            "email"=>"vendor163.com"
            "id"=> $id
        ];
      /*  $validate = new Validate([
            "name"=>"require|max:10",
            "email"=>"email"
        ]);
      */
        //验证
//        $validate = new TestValidate();
       /* $validate = new IDMustBePositiveInt();
        $result = $validate->batch()->check($data);//批量处理验证错误信息,返回的时数组
        //var_dump($validate->getError()) ;
        if($result){

        }else{

        }*/
    }
}