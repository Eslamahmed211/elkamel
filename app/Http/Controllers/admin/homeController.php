<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class homeController extends Controller
{
    function header(Request $request)
    {
        $data = $request->validate([
            "header_img" => "nullable|image",
            "header_title" => "nullable|string",
            "header_dis" => "nullable|string",
        ]);

        if (isset($data["header_img"])) {
            $data["header_img"] = Storage::put("public/home", $data["header_img"]);
        }


        if (isset($data["header_img"])) {
            update_home("header_img", $data["header_img"]);
        }

        update_home("header_title", $data["header_title"]);
        update_home("header_dis", $data["header_dis"]);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    function distinguishes_img(Request $request)
    {
        $data = $request->validate([
            "distinguishes_img" => "nullable|image",
        ]);

        if (isset($data["distinguishes_img"])) {
            $data["distinguishes_img"] = Storage::put("public/home", $data["distinguishes_img"]);
        }


        if (isset($data["distinguishes_img"])) {
            update_varibale("distinguishes_img", $data["distinguishes_img"]);
        }


        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }


    function section2(Request $request)
    {
        $data = $request->validate([
            "about_dis" => "nullable|string",
            "our_services_dis" => "nullable|string",
        ]);

        update_home("about_dis", $data["about_dis"]);
        update_home("our_services_dis", $data["our_services_dis"]);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    function what_saying(Request $request)
    {
        $data = $request->validate([
            "sp_img" => "nullable|image",
            "sp" => "nullable|string",
        ]);

        if (isset($data["sp_img"])) {
            $data["sp_img"] = Storage::put("public/home", $data["sp_img"]);
            update_home("sp_img", $data["sp_img"]);
        }


        update_home("sp", $data["sp"]);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }


    function call_us(Request $request)
    {
        $data = $request->validate([
            "call_dis" => "nullable|string",
            "call_adress" => "nullable|string",
            "call_email" => "nullable|string",
            "call_phone" => "nullable|string",
        ]);

        update_home("call_dis", $data["call_dis"]);
        update_home("call_adress", $data["call_adress"]);
        update_home("call_email", $data["call_email"]);
        update_home("call_phone", $data["call_phone"]);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }


}
