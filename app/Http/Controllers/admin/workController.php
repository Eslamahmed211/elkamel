<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class workController extends Controller
{
    function social()
    {
        return view("admin/social");
    }
    function social_update( Request $request)
    {
        $data = $request->validate([
            "facebook" => "nullable|string" ,
            "insta" => "nullable|string" ,
            "x" => "nullable|string" ,
            "youtube" => "nullable|string" ,
        ]);


        foreach ($data as $key => $value) {
            update_varibale($key , $value);
        }

        return redirect()->back()->with("success","تم التعديل بنجاح");

    }
}
