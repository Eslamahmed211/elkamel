<?php

namespace App\Http\Controllers;

use App\Models\say;
use Illuminate\Http\Request;

class SayController extends Controller
{
    function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "dis" => "required|string",
        ]);


        say::create($data);

        return redirect()->back()->with("success", "تم الاضافة بنجاح");
    }

    public function destroy(Request $request)
    {
        $say = say::findOrFail($request->say_id);
        $say->delete();
        return redirect()->back()->with("success", "تم الازالة بنجاح");
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            "name" => "required|string",
            "dis" => "required|string",
            "say_id" => "required"
        ]);



        say::find($data["say_id"])->update($data);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
}
