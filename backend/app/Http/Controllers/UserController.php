<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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
}