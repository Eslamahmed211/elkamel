<?php

namespace App\Http\Controllers;

use App\Models\mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class aboutController extends Controller
{
    function index()
    {
        $missions = mission::get();
        return view("admin/about/index" ,compact("missions"));
    }

    function update_about_header(Request $request)
    {
        $data = $request->validate([
            "header_about_img" => "nullable|image",
            "header_about_dis" => "nullable|string",
        ]);

        if (isset($data["header_about_img"])) {
            $data["header_about_img"] = Storage::put("public/about", $data["header_about_img"]);
        }
        if (isset($data["header_about_img"])) {
            update_varibale("header_about_img", $data["header_about_img"]);
        }

        update_varibale("header_about_dis", $data["header_about_dis"]);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
    function update_about_sec2(Request $request)
    {
        $data = $request->validate([
            "sec2_about_img" => "nullable|image",
            "sec2_about_dis" => "nullable|string",
            "mission_dis" => "nullable|string",
            "distinguishes_dis" => "nullable|string",
        ]);

        // dd($data);


        if (isset($data["sec2_about_img"])) {
            $data["sec2_about_img"] = Storage::put("public/about", $data["sec2_about_img"]);
        }
        if (isset($data["sec2_about_img"])) {
            update_varibale("sec2_about_img", $data["sec2_about_img"]);
        }

        update_varibale("sec2_about_dis", $data["sec2_about_dis"]);
        update_varibale("mission_dis", $data["mission_dis"]);
        update_varibale("distinguishes_dis", $data["distinguishes_dis"]);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }


}
