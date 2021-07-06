<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\HomeController;
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
//Роут для показа визитки
Route::get('/card/{media}', [App\Http\Controllers\MediaController::class, 'findById'])->name('findById');

//Роут для выхода
Route::get('logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

Auth::routes();
//Роуты для авторизованых юзеров
Route::get('/home', [App\Http\Controllers\AuthUsers\UsersController::class, 'index'])->name('home');
Route::get('/home/edit', [App\Http\Controllers\AuthUsers\UsersController::class, 'edit'])->name('user.edit');
Route::post('/home/edit', [App\Http\Controllers\AuthUsers\UsersController::class, 'update'])->name('user.edit');
//Route::resource('/home/user', HomeController::class);

//Роуты для администратора
Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin');
    Route::get('/search', [UsersController::class, 'search'])->name('search');
    Route::resource('users', UsersController::class);
    Route::resource('media', MediaController::class);

});



