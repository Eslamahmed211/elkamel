<?php

namespace App\Http\Controllers;

use App\Models\mission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class missionController extends Controller
{
   function store(Request $request)
    {
        $data = $request->validate([
            "img" => "required|image",
            "title" => "required|string",
            "dis" => "required|string",
        ]);

        $data['img'] = Storage::put("public/missions", $data['img']);

        mission::create($data);

        return redirect()->back()->with("success", "تم الاضافة بنجاح");
    }

    public function destroy(Request $request)
    {
        $mission = mission::findOrFail($request->mission_id);
        $oldPath =  $mission->img;
        $mission->delete();
        Storage::delete($oldPath);
        return redirect()->back()->with("success", "تم الازالة بنجاح");
    }

    public function update(Request $request , mission $mission )
    {

        $data = $request->validate([
            "img" => "nullable|image",
            "title" => "required|string",
            "dis" => "required|string",
        ]);

        if (isset($data['img'])) {
            $data['img'] = Storage::put("public/missions", $data['img']);
        }

        $mission->update($data);

        return redirect()->back()->with('success','تم التعديل بنجاح');

    }

    function edit(mission $mission ) {
        return view("admin/about/mission_edit" , compact("mission"));
    }
}
