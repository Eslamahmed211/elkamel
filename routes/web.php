<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\profile\profileController;
use App\Models\page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

include('auth_routes.php');

Route::prefix("profile")->middleware("auth")->group(function () {

    Route::get('/', [profileController::class, 'index']);
    Route::put('info', [profileController::class, 'info']);
    Route::put('password', [profileController::class, 'password']);
});


Route::get('delete_img', function () {

    $user = auth()->user();

    if ($user->img != null) {
        Storage::delete($user->img);
    }
    $user->img = null;
    $user->save();

    return redirect()->back()->with("success", "تم ازالة الصورة بنجاح");
});

Route::get('/', function () {
    return view("users/home");
});
Route::get('about', function () {
    return view("users/about");
});
Route::get('services', function () {
    return view("users/services");
});
Route::get('questions', function () {
    return view("users/questions");
});
Route::get('contactus', function () {
    return view("users/contactus");
});

Route::get('/pages/{slug}', function ($slug) {

    $page = page::where("slug", $slug)->first();
    return view("users/page", compact("page"));
});


Route::post('send_message', [MessageController::class, "create"]);
Route::post('email', [MessageController::class, "email"]);
