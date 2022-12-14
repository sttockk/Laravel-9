<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::delete('/index/destroy/{user}', [UserController::class, 'destroy'])->name('user.delete');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
