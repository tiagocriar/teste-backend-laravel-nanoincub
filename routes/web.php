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

Route::get('/ui-dashboard', function () {
    return view('ui-dashboard');
});

Route::group(['prefix' => 'app'], function(){
    Route::get('login', [LoginController::class, 'index'])->name('login');
});

Route::group(['prefix' => 'app/admin', 'middleware' => ['auth']], function(){
});
