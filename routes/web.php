<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
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

Route::get('/',[HomeController::class,'index'])->name('home');


Route::group(['prefix'=>'posts','as'=>'posts.'], function(){
    Route::get('/',[PostController::class,'index'])->name('index');
    Route::get('/{slug}',[PostController::class,'show'])->name('show');
    Route::get('/favourite/{post_id}',[PostController::class,'favourite'])->name('addFavourite');
});

Route::get('tag/{slug}',[TagController::class,'index'])->name('tag.index');
Route::post('create',[CommentController::class,'create'])->name('comment.create');



Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('authenticate',[AuthController::class,'authenticate'])->name('authenticate');
Route::post('logout',[AuthController::class,'logout'])->name('logout');





