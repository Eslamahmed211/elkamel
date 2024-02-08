<?php

namespace App\Http\Controllers\admin\users;

use App\Http\Controllers\Controller;
use App\Models\role;
use App\Models\user;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class userController extends Controller
{

    public function index()
    {
        $users =  user::orderBy('id', 'desc')->withTrashed()->get();

        return view('admin/users/index', compact('users'));
    }

    function search(Request $request)
    {


        $id = '';
        $name = '';
        $email = '';

        if (!empty($request->id)) {
            $id = $request->id;
        }

        if (!empty($request->name)) {

            $name = $request->name;
        }

        if (!empty($request->email)) {

            $email = $request->email;
        }


        $users = User::where("name", "LIKE", "{$name}%");


        $id != ""  ? $users =  $users->where("id",  "{$id}") : "";


        $users =  $users->where("email", "LIKE", "%{$email}%");


        $users =   $users->orderBy('id', 'desc')->get();

        return view('admin/users/index', compact('users'));
    }

    public function create()
    {

        $roles = role::get();
        return view('admin/users/create', compact("roles"));
    }


    public function store(Request $request)
    {

        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|email",
            "password" => "required|min:8|max:32|confirmed|string",
            "role_id" => "required",

        ]);
        if (check_Email($data['email'])) {
            return redirect()->back();
        }

        $data["active"] = "1";
        $data["password"] = bcrypt($data["password"]);


        User::create($data);

        return Redirect::back()->with("success", "تم الاضافة بنجاح");
    }

    public function edit(user $user)
    {

        $roles = role::get();

        return view('admin/users/edit', compact('user' , "roles"));
    }

    public function update(Request $request, user $user)
    {

        $data = $request->validate([
            "name" => "required|min:3|string",
            "password" => "nullable|min:8|max:32|confirmed|string",
            "role_id" => "nullable",
        ]);



        if (!isset($data['permissions'])) {
            $data['permissions'] = '[]';
        } else {


            $data['permissions'] =  json_encode($data['permissions']);
        }

        if ($data['password'] != null) {
            $data["password"] = bcrypt($data["password"]);
        } else {
            unset($data["password"]);
        }


        try {

            $user->update($data);


            return Redirect::back()->with("success", "تم التعديل بنجاح");
        } catch (\Throwable $th) {

            return Redirect::back()->with("error", "لم يتم التعديل");
        }
    }


    public function destroy(Request $request)
    {
        if ($request->delete != "ازالة") {
            return Redirect::back()->with("error", "قم بكتابة ازالة  ليتم الازالة");
        }


        try {

            $user = user::findOrFail($request->user_id);

            $user->delete();

            return redirect('admin/users')->with("success", "تم الازالة بنجاح");
        } catch (\Throwable $th) {
            return Redirect::back()->with("error", "لم يتم الازالة");
        }
    }

    function restore($id)
    {



        try {

            $user = user::withTrashed()->find($id);
            $user->restore();



            return Redirect::back()->with("success", "تم استرجاع الحساب بنجاح");
        } catch (\Throwable $th) {
            return Redirect::back()->with("error", "لم يتم الاسترجاع");
        }
    }

}
