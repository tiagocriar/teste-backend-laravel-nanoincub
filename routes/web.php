<?php

use App\Http\Controllers\LoginController;
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

Route::group(['prefix' => 'login'], function(){
    Route::get('administrador', [LoginController::class, 'showLoginAdministrador'])->name('login.administrador');
    Route::post('administrador', [LoginController::class, 'postLoginAdministrador'])->name('login.administrador.post');
});

Route::group(['prefix' => 'administrador', 'middleware' => ['auth:administrador']], function(){
    Route::get('/', function () {
        return redirect()->route('administrador.dashboard');
    });

    Route::get('/ui-dashboard', function () {
        return view('ui-dashboard');
    })->name('administrador.dashboard');

    Route::post('administrador/logout', [LoginController::class, 'logoutAdministrador'])->name('administrador.logout');
});
