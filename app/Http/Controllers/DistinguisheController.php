<?php

namespace App\Http\Controllers;

use App\Models\distinguishe;
use Illuminate\Http\Request;

class DistinguisheController extends Controller
{
    function store(Request $request)
    {
        $data = $request->validate([
            "dis" => "required|string",
        ]);


        distinguishe::create($data);

        return redirect()->back()->with("success", "تم الاضافة بنجاح");
    }

    public function destroy(Request $request)
    {
        $distinguishe = distinguishe::findOrFail($request->distinguishe_id);
        $distinguishe->delete();
        return redirect()->back()->with("success", "تم الازالة بنجاح");
    }

    public function update(Request $request)
    {

        $data = $request->validate([
            "dis" => "required|string",
            "distinguishe_id" => "required"
        ]);



        distinguishe::find($data["distinguishe_id"])->update($data);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
}
