<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\admin\homeController;
use App\Http\Controllers\admin\rolesController;
use App\Http\Controllers\admin\serviceContrller;
use App\Http\Controllers\admin\users\userController;
use App\Http\Controllers\faqsController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\missionController;
use Illuminate\Support\Facades\Route;


Route::get("home", function () {
    return view("admin/home");
});


Route::middleware('checkRole:roles')->prefix("roles")->group(function () {
    Route::get('/', [rolesController::class, "index"]);
    Route::get('create', [rolesController::class, "create"]);
    Route::post('/', [rolesController::class, "store"]);
    Route::delete('destroy', [rolesController::class, "destroy"]);
    Route::get('{role}/edit', [rolesController::class, "edit"]);
    Route::put('{role}', [rolesController::class, "update"]);
});


Route::middleware('checkRole:users')->prefix("users")->group(function () {

    Route::get('/', [userController::class, 'index']);
    Route::get('search', [userController::class, 'search']);
    Route::get('create', [userController::class, 'create']);
    Route::post('/', [userController::class, 'store']);
    Route::get('{user}/edit', [userController::class, 'edit']);
    Route::put('{user}', [userController::class, 'update']);
    Route::DELETE('destroy', [userController::class, 'destroy']);
    Route::get('restore/{id}', [userController::class, 'restore']);
});



Route::middleware('checkRole:home')->prefix("home")->group(function () {
    Route::post('header', [homeController::class, 'header']);
    Route::post('section2', [homeController::class, 'section2']);
    Route::post('what_saying', [homeController::class, 'what_saying']);
    Route::post('call_us', [homeController::class, 'call_us']);
});


Route::middleware('checkRole:faqs')->prefix("faqs")->group(function () {
    Route::get('/', [faqsController::class, 'index']);
    Route::post('/', [faqsController::class, 'store']);
    Route::get('create', [faqsController::class, 'create']);
    Route::get('{faq}/edit', [faqsController::class, 'edit']);
    Route::put('{faq}', [faqsController::class, 'update']);
    Route::delete('{faq}', [faqsController::class, 'destroy']);
});



Route::middleware('checkRole:services')->prefix("services")->group(function () {
    Route::get('/', [serviceContrller::class, 'index']);
    Route::put('header', [serviceContrller::class, 'update_services_header']);
    Route::post('/', [serviceContrller::class, 'store_services']);
    Route::delete('destroy', [serviceContrller::class, 'destroy']);
    Route::get('{service}/edit', [serviceContrller::class, 'edit']);
    Route::put('{service}', [serviceContrller::class, 'update']);
});


Route::middleware('checkRole:about')->prefix("about")->group(function () {
    Route::get('/', [aboutController::class, 'index']);
    Route::put('header', [aboutController::class, 'update_about_header']);
    Route::put('sec2', [aboutController::class, 'update_about_sec2']);
});



Route::middleware('checkRole:about')->prefix("missions")->group(function () {
    Route::post('/', [missionController::class, 'store']);
    Route::delete('destroy', [missionController::class, 'destroy']);
    Route::get('{mission}/edit', [missionController::class, 'edit']);
    Route::put('{mission}', [missionController::class, 'update']);
});



Route::middleware('checkRole:about')->prefix("features")->group(function () {
    Route::post('/', [FeatureController::class, 'store']);
    Route::delete('destroy', [FeatureController::class, 'destroy']);
    Route::put('update', [FeatureController::class, 'update']);
});
