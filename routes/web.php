<?php

use App\Http\Controllers\profile\profileController;
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
