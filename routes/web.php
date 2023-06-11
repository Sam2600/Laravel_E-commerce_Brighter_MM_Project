<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'login')->name('login');
Route::post('/', [UserController::class, 'login'])->name('admins.login');
Route::get('/logout', [UserController::class, 'logout']);

//First way
Route::group(['middleware'=>'auth', 'prefix' => 'admin'], function()
{
    Route::get('/', fn()=>view('admin.home'))->name('admin.home');

    Route::resource('categories', CategoryController::class);
    Route::resource('categories.subcategories', SubCategoryController::class)->shallow();

});

// Second way
//Route::get('admin/', fn()=> view("admin.home"))->middleware('auth')->name('admin.home');


