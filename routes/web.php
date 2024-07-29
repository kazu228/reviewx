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
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');
Route::post('/add', [App\Http\Controllers\HomeController::class, 'add'])->name('add');
Route::post('/comment/{id}', [App\Http\Controllers\HomeController::class, 'comment'])->name('comment');

Route::post('/store/{id}', [App\Http\Controllers\CommentController::class, 'store'])->name('comment_store');
Route::get('/terms', [App\Http\Controllers\HomeController::class, 'terms'])->name('terms');