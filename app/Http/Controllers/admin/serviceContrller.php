<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class serviceContrller extends Controller
{


    function index()
    {
        $services = service::get();
        return view("admin/services/index", compact("services"));
    }

    function update_services_header(Request $request)
    {
        $data = $request->validate([
            "header_services_img" => "nullable|image",
            "header_services_dis" => "nullable|string",
        ]);

        if (isset($data["header_services_img"])) {
            $data["header_services_img"] = Storage::put("public/services", $data["header_services_img"]);
        }
        if (isset($data["header_services_img"])) {
            update_varibale("header_services_img", $data["header_services_img"]);
        }

        update_varibale("header_services_dis", $data["header_services_dis"]);
        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    function store_services(Request $request)
    {
        $data = $request->validate([
            "img" => "required|image",
            "title" => "required|string",
            "dis" => "required|string",
        ]);

        $data['img'] = Storage::put("public/services", $data['img']);

        service::create($data);

        return redirect()->back()->with("success", "تم الاضافة بنجاح");
    }

    public function destroy(Request $request)
    {
        $service = service::findOrFail($request->service_id);
        $oldPath =  $service->img;
        $service->delete();
        Storage::delete($oldPath);
        return redirect()->back()->with("success", "تم الازالة بنجاح");
    }

    public function update(Request $request , service $service )
    {

        $data = $request->validate([
            "img" => "nullable|image",
            "title" => "required|string",
            "dis" => "required|string",
        ]);

        if (isset($data['img'])) {
            $data['img'] = Storage::put("public/services", $data['img']);
        }

        $service->update($data);

        return redirect()->back()->with('success','تم التعديل بنجاح');

    }

    function edit(service $service ) {
        return view("admin/services/edit" , compact("service"));
    }
}
