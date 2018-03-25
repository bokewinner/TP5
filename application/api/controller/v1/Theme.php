<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/2/2
 * Time: 10:53
 */

namespace app\api\controller\v1;


use app\api\validate\IDCollection;
use app\api\model\Theme as ThemeModel;
use app\api\validate\IDMustBePositiveInt;
use app\lib\exception\ThemeException;

class Theme
{
    /*
     * @url theme?ids = id1,id2,id3....
     * @return 一组theme模型
     * */
    public function getSimpleList($ids = ''){
        (new IDCollection())->gocheck();
        $ids = explode(",",$ids);
        $result = ThemeModel::with('topicImg,headImg')->select($ids);
        if($result->isEmpty()){
            throw new ThemeException();
        }
        return $result;
    }
    public function getComplexOne($id){
        /*
         * @url theme/:id
         * */
        (new IDMustBePositiveInt())->gocheck();
        $theme = ThemeModel::getThemeWithProducts($id);
        if(!$theme){
            throw new ThemeException();
        }
        return $theme;
    }
}