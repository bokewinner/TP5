<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/1/25
 * Time: 20:23
 */

namespace app\api\model;


use think\Db;
use think\Model;

class Banner extends BaseModel{
    protected $hidden = ['update_time','delete_time'];
    //protected $visible = ['id'];
    //protected $table = "category";
    public function items(){
        //BannerItem表附属于Banner表，而且这三张表是一套嵌一套的，
        //Banner表要关联这两种表的形式是模型名::with("items","items.img");==>with：带有，带有items和items下的img
        return $this->hasMany("BannerItem","banner_id","id");
    }
    public static function getBannerByID($id){
        $banner = self::with(['items','items.img'])->find($id);
        return $banner;
       //$result = Db::table("banner_item")->where("banner_id","=",$id)->select();
        //config配置中log.type设置为"test"，会导致全局日志记录功能失效
//        $result = Db::table("banner_item")->where(function ($query) use ($id)
//        {
//            $query->where("banner_id","=",$id);
//        }
//        )->select();
        //Db::table('banner_item');
       // Db::where('banner_id','=',$id);
        //$result = Db::select();
//        return $result;
        //find:只返回一个结果，是一个一维数组
        //select:返回所有的结果，是二维数组
//        $result = Db::query('select * from banner_item where banner_id = ?',[$id]);
//        return $result;
        //根据id返回banner信息
        /*try{
            1/0;
        }catch (Exception $ex){
            throw $ex;
        }
        return "this is banner";*/
       // return null;
    }
}