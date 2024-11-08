<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function upload(Request $request){
        $path = $request->file('file')->storeAs('public','vikas.jpg');
        $t= explode("/",$path);
        $v=$t['1'];

            return view('login',['path'=>$v]);
    //
}
}