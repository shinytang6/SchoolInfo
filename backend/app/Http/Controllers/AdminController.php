<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Admin;
use App\Activity;
use Hash;

use App\Http\Requests;

class AdminController extends Controller
{
  /**
   *
   *
   * @param Request $request
   * @param int $id
   * @return Response
   */

    public function update(Request $request,$id){
      $request->fresh();
      return $request->old("adminname");
    }

    public function login(Request $request){
      $adminname = $request->adminname;
      $password = $request->password;

      $this->validate($request, [
        'adminname'=>'required',
        'password'=>'required'
      ]);

      // 检测管理员是否存在
      $admin = Admin::where('adminname', $adminname)->first();
      if(!$admin)
          return ["status" => 0,"msg" => "admin doesn't exist"];
      else{
          $hashed_password = $admin->password;
          // 检查明文密码是否与加密后的密码相符
          if (!Hash::check($password, $hashed_password))
              return ["status" => 0,"msg" => "password is wrong"];
          else {

              // 写入Session
              $request->session()->put("adminname",$adminname);
              $request->session()->put("admin_id",$admin->id);
              return ["status" => 1,"msg" => "admin " . $admin->id . " login succeed"];

              // dd(session()->all());
    }

    public function logout(Request $request){
      $request->session()->flush();
      return ["status" => 1,"msg" => "logout succeed"];
    }
}
