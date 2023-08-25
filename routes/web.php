<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/blog',App\Http\Controllers\BlogController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//backend
Route::group(['prefix'=>'backend','as'=> 'backend.'],function(){
    Route::get('/',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('dashboard');
    Route::resource('categories',App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('posts',App\Http\Controllers\Admin\PostController::class);
    Route::resource('users',App\Http\Controllers\Admin\UserController::class);

});