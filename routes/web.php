<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;

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
Auth::routes(['verify' => true]);

Route::middleware(['auth', 'user.check'])->group(function () {
    Route::get('/', [PositionController::class, 'index'])->name('positions');


Route::prefix('profile')->group(function () {
    Route::get('/', [UserController::class, 'edit'])->name('profile');
    Route::post('/', [UserController::class, 'update'])->name('profile.update');
    Route::get('/user', [UserController::class, 'show'])->name('user.show');
});
});

Route::middleware(['auth', 'admin.check'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::resource('positions', AdminUserController::class);
        Route::resource('users', AdminUserController::class);

    });
});


//Route::get('/', [ProjectController::class, 'index'])->name('projects')->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
//Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin')->middleware('auth.type:admin');

