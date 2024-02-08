<?php

namespace App\Http\Controllers;

use App\Models\feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|string",
            "dis" => "required|string"
        ]);

        $feature = feature::create($data);

        return redirect()->back()->with("success", "تم الاضافة بنجاح");
    }
    function update(Request $request)
    {
        $data = $request->validate([
            "title" => "required|string",
            "dis" => "required|string" ,
            "feature_id" => "required|string" ,
        ]);
        feature::find($data["feature_id"])->update($data);
        return redirect()->back()->with("success", "تم التعديل بنجاح");
    }

    public function destroy(Request $request)
    {
        $feature = feature::findOrFail($request->feature_id);
        $feature->delete();
        return redirect()->back()->with("success", "تم الازالة بنجاح");
    }
}
