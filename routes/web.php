<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('external.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\Dashboard\HomeController::class, 'index'])->name('home');

Route::resource('posts', PostController::class);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('task', App\Http\Controllers\TaskController::class);
});