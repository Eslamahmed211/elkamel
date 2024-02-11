<?php

namespace App\Http\Controllers;

use App\Models\email;
use App\Models\message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    function create(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "phone" => "required|string",
            "message" => "required|string",
            "star" => "required",
        ], [
            "email.email" => "هذه ليست صيغة ايميل"
        ]);

        message::create($data);

        return redirect()->back()->with("success", "تم الارسال بنجاح");
    }

    function email(Request $request)
    {
        $data = $request->validate([
            "email" => "required|email",
        ], [
            "email.required" => "يرجي كتابة الايميل",
            "email.email" => "هذه ليست صيغة ايميل"
        ]);

        if (email::where("email", $data["email"])->exists()) {
            return redirect()->back()->with("error", "تم ارسال هذا البريد من قبل");
        } else {
            email::create($data);
            return redirect()->back()->with("success", "تم الاشتراك بنجاح");
        }
    }
}
