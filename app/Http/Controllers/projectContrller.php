<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class projectContrller extends Controller
{
    function index()
    {
        $projects = project::get();
        return view("admin/projects/index", compact("projects"));
    }

    function update_project_header(Request $request)
    {
        $data = $request->validate([
            "header_project_img" => "nullable|image",
            "header_project_dis" => "nullable|string",
            "project_dis" => "nullable|string",
        ]);

        if (isset($data["header_project_img"])) {
            $data["header_project_img"] = Storage::put("public/projects", $data["header_project_img"]);
        }

        if (isset($data["header_project_img"])) {
            update_varibale("header_project_img", $data["header_project_img"]);
        }
        if (isset($data["project_dis"])) {
            update_varibale("project_dis", $data["project_dis"]);
        }

        update_varibale("header_project_dis", $data["header_project_dis"]);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    function store_projects(Request $request)
    {
        $data = $request->validate([
            "img" => "required|image",
            "title" => "required|string",
            "start_at" => "nullable",
            "end_at" => "nullable",
            "short_dis" => "nullable",
            "long_dis" => "nullable",
            "percent" => "nullable",
        ]);

        if (isset($data['img'])) {
            $data['img'] = Storage::put("public/projects", $data['img']);
        }



        project::create($data);

        return redirect()->back()->with("success", "تم الاضافة بنجاح");
    }

    public function destroy(Request $request)
    {
        $project = project::findOrFail($request->project_id);
        $oldPath =  $project->img;
        $project->delete();
        Storage::delete($oldPath);
        return redirect()->back()->with("success", "تم الازالة بنجاح");
    }

    function edit(project $project)
    {
        return view("admin/projects/edit", compact("project"));
    }
    public function update(Request $request, project $project)
    {
        $data = $request->validate([
            "img" => "nullable|image",
            "title" => "required|string",
            "start_at" => "nullable",
            "end_at" => "nullable",
            "short_dis" => "nullable",
            "long_dis" => "nullable",
            "percent" => "nullable",
        ]);


        if (isset($data['img'])) {
            $data['img'] = Storage::put("public/projects", $data['img']);
        }

        $project->update($data);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }
}
