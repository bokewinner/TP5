<?php
/**
 * Created by phpstorm.
 * User: boke
 * Date: 2018/2/2
 * Time: 15:54
 */

namespace app\api\validate;


class IDCollection extends BaseValidate
{
    protected $rule = [
        "ids"=> "require|checkIDs"
    ];
    protected $message = [
        "ids"=>"ids必须是以逗号为分割的正整数"
    ];
    //ids = id1,id2....
    protected function checkIDs($value){
        $values = explode(",",$value);
        foreach($values as $id){
            if(!$this->IsPositiveInteger($id)){
                return false;
            }
        }
        return true;
    }
}