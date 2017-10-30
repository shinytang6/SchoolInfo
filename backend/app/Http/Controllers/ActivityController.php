<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Activity;
class ActivityController extends BaseController
{
    /** 
        发布活动
     */
    public function add(Request $request){
        // $this->isLogin()调用父控制器的方法
        // 检查用户是否登录
        if($this->isLogin()) {
             $new_activity = new Activity;
             $new_activity->title = $request->title;
             $new_activity->desc = $request->desc;
             $new_activity->user_id = session("user_id");
             return $new_activity->save()?
                 ["status" => 1,"msg" => "create activities succeed"]:
                 ["status" => 0,"msg" => "db insert failed"];
        } else {
            return ["status" => 0,"msg" => "You need to login first"];
        }
    }

     /** 
        更新活动
     */
    public function update(Request $request){
        if($this->isLogin()) {
            $id = $request->id;
            // 根据参数id查找对应的活动
            $activity = Activity::find($id);

            // 检查活动是否存在
            if(!$activity)
                return ["status" => 0,"msg" => "Activity not exists"];

            // 检查该活动的创建用户是否与当前用户一致，否则无权限
            if($activity->user_id == session("user_id")){
                if($request->title)
                    $activity->title = $request->title;
                if($request->desc)
                    $activity->desc = $request->desc;
                return $activity->save()?
                    ["status" => 1,"msg" => "Modify succeed"]:
                    ["status" => 0,"msg" => "db insert failed"];;
            }
            else{
                return ["status" => 0,"msg" => "You don't have the access to modify this question"];
            }
        } else {
            return ["status" => 0,"msg" => "You need to login first"];
        }
    }
}