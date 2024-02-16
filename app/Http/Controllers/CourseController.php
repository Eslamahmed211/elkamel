<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\course_img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\lib\img;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    function index()
    {
        $courses = course::get();
        return view("admin/courses/index", compact("courses"));
    }

    function update_course_header(Request $request)
    {
        $data = $request->validate([
            "header_courses_img" => "nullable|image",
            "header_courses_dis" => "nullable|string",
            "courses_dis" => "nullable|string",
        ]);


        if (isset($data["header_courses_img"])) {
            $data["header_courses_img"] = Storage::put("public/courses", $data["header_courses_img"]);
        }

        if (isset($data["header_courses_img"])) {
            update_varibale("header_courses_img", $data["header_courses_img"]);
        }
        if (isset($data["courses_dis"])) {
            update_varibale("courses_dis", $data["courses_dis"]);
        }

        if (isset($data["header_courses_dis"])) {
            update_varibale("header_courses_dis", $data["header_courses_dis"]);

        }

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    function store_courses(Request $request)
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
            $data['img'] = Storage::put("public/courses", $data['img']);
        }


        $data['slug'] = generateSlug($data['title']);



        course::create($data);

        return redirect()->back()->with("success", "تم الاضافة بنجاح");
    }

    public function destroy(Request $request)
    {
        $course = course::findOrFail($request->course_id);
        $oldPath =  $course->img;
        $course->delete();
        Storage::delete($oldPath);
        return redirect()->back()->with("success", "تم الازالة بنجاح");
    }

    function edit(course $course)
    {
        return view("admin/courses/edit", compact("course"));
    }
    function img(course $course)
    {
        return view("admin/courses/imgs", compact("course"));
    }
    public function update(Request $request, course $course)
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

        $data['slug'] = generateSlug($data['title']);


        if (isset($data['img'])) {
            $data['img'] = Storage::put("public/courses", $data['img']);
        }

        $course->update($data);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    function storeImgs(Request $request, course $course)
    {

        $data = $request->validate([
            "imgs" => "required"
        ], [
            "imgs.required" => "يرجي اضافة صور"
        ]);



        // try {

        if (isset($data["imgs"])) {
            $Uploads = [];

            foreach ($data["imgs"] as $img) {
                $data['img'] = img::upload('course', $img, 800);
                array_push($Uploads, $data['img']);
            }


            foreach ($Uploads as $Upload) {
                course_img::create([
                    "course_id" => $course->id,
                    "img" => $Upload,
                ]);
            }
        }
        // } catch (\Throwable $th) {
        //     return Redirect::back()->with("error", "خطأ في اضافة صور المنتج")->withInput();;
        // }

        return Redirect::back()->with("success", "تم الاضافة بنجاح");
    }

    function destroyImgs(Request $request)
    {


            $img = course_img::find($request->img_id);


            $old_path = $img->img;

            $img->delete();

            Storage::delete($old_path);


            return Redirect::back()->with("success", "تم الازالة بنجاح");

    }

    public function changeOrder(Request $request)
    {



        course_img::where('id', $request->id)->update([
            'order' => $request->order + 1
        ]);

        return true;
    }
}
