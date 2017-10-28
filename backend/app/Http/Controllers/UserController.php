<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * 更新指定用户
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request,$id)
    {
        $request->flash();
        return $request->old("username");
    }

    public function signup(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        // 检测用户名和密码是否为空
        if(!$username || !$password){
            return ["status" => 0,"msg" => "username and password can't be empty"];
        }

        // 检测用户是否存在
        $user_exist = User::where('username', $username)->first();
        if($user_exist){
            return ["status" => 0,"msg" => "user exists"];
        }

        // 加密密码
        $hashed_password = Hash::make($password);

        // dd 函数为 Laravel 内置的打印输出函数
        // dd($hashed_password);

        // 存储用户进数据库
        $new_user = new User;
        $new_user->username = $username;
        $new_user->password = $hashed_password;
        if($new_user->save())
            return ["status" => 1,"msg" => "user " . $new_user->id . " save succeed"];
        else
            return ["status" => 0,"msg" => "db insert failed"];
        
        return 1;
    }
}