<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AllresepController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
// use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    // Route::get('/profile',function(){
    //     return view('share');
    // });
    Route::resource('/share', ShareController::class);
    Route::resource('/profile', ProfileController::class);
});


Route::group(['prefix' => 'admin',
    'middleware' => ['auth', 'isAdmin']], function () {
        Route::get('/dashboard', function () {
            return view('home');
        })->name('admin');
        Route::resource('kota', KotaController::class);
        Route::resource('kategori', KategoriController::class);
        Route::resource('resep', ResepController::class);
        Route::resource('allresep', AllresepController::class);
    });
// Route::get('/admin', function () {
//     return view('layouts.admin');
// });

// Route::get('/errors', function () {
//     return view('errors.403');
// });
// Route::get('/share', function () {
//     return view('share');
// });
Route::post('register', [RegisterController::class,'create'])->name('register-create');
// Route::get('login-user', [LoginController::class , 'login'])->name('loginpost');

// Route::resource('/kota', KotaController::class);
