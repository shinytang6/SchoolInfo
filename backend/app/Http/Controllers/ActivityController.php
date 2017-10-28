<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ActivityController extends BaseController
{
    /** 
        验证用户是否登录
     */
    public function add(Request $request){
        // $this->isLogin()调用父控制器的方法
        if($this->isLogin()){
            return "logged";
        } else{
            return "";
        }
    }
}