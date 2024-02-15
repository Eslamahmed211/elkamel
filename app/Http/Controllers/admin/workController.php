<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\email;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class workController extends Controller
{
    function settings()
    {
        return view("admin/social");
    }
    function settings_update(Request $request)
    {
        $data = $request->validate([
            "title" => "required|string",
            "facebook" => "nullable|string",
            "insta" => "nullable|string",
            "x" => "nullable|string",
            "youtube" => "nullable|string",
            "logo" => "nullable|image",
        ]);


        if (isset($data['logo'])) {
            $data['logo'] = Storage::put("public/logo", $data['logo']);
        }

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


    function messages_index()
    {
        $messages = message::orderBy("id", "desc")->get();
        return view("admin/messages", compact("messages"));
    }

    public function messages_destroy(Request $request)
    {
        $message = message::findOrFail($request->message_id);
        $message->delete();
        return redirect()->back()->with("success", "تم الازالة بنجاح");
    }
}
