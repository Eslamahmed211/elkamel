<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class workController extends Controller
{
    function social()
    {
        return view("admin/social");
    }
    function social_update(Request $request)
    {
        $data = $request->validate([
            "facebook" => "nullable|string",
            "insta" => "nullable|string",
            "x" => "nullable|string",
            "youtube" => "nullable|string",
        ]);


        foreach ($data as $key => $value) {
            update_varibale($key, $value);
        }

        return redirect()->back()->with("success", "تم التعديل بنجاح");
    }

    function emails_index()
    {
        $emails = email::orderBy("id", "desc")->get();
        return view("admin/emails", compact("emails"));
    }
    function emails_export()
    {
        $emails = email::orderBy("id", "desc")->pluck('email')->toArray();

        $emailText = implode("\n", $emails);

        $filePath = storage_path('app/emails.txt');

        Storage::put('emails.txt', $emailText);

        return response()->download($filePath);
    }
}
