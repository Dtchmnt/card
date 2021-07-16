<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\UsersMediaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Redirect;
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
Route::get('/card/{slug}', [App\Http\Controllers\MediaController::class, 'findById'])->name('findById');
Route::get('/downloadcard/{id}', [App\Http\Controllers\CardController::class, 'downloadVcard'])->name('downloadVcard');

//Роут для выхода
Route::get('logout', function () {
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');
})->name('logout');

Auth::routes();
//Роуты для авторизованых юзеров
Route::get('/home', [App\Http\Controllers\AuthUsers\UsersController::class, 'index'])->name('home');
//Роуты для обновления данных
Route::get('/home/edit', [App\Http\Controllers\AuthUsers\UsersController::class, 'edit'])->name('user.edit');
Route::post('/home/edit', [App\Http\Controllers\AuthUsers\UsersController::class, 'update'])->name('user.edit');
Route::post('/home/edit/avatar', [App\Http\Controllers\AuthUsers\UsersController::class, 'updateAvatar'])->name('user.updateAvatar');
//Роуты для обновления медиа данных
Route::get('/home/media/edit', [App\Http\Controllers\AuthUsers\MediaController::class, 'edit'])->name('user.media.edit');
Route::post('/home/media/edit', [App\Http\Controllers\AuthUsers\MediaController::class, 'update'])->name('user.media.edit');

//Роуты для администратора
Route::middleware(['role:admin'])->prefix('admin_panel')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('homeAdmin');
    Route::get('/search', [UsersMediaController::class, 'search'])->name('search');
    Route::resource('users', UsersMediaController::class);
    Route::resource('media', MediaController::class);
    Route::put('/edit/avatar/{id}', [App\Http\Controllers\Admin\MediaController::class, 'updateAvatarAdmin'])->name('admin.updateAvatar');
});




