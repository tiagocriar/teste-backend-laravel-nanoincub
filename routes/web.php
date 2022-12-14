<?php

use App\Http\Controllers\Administrador\FuncionarioController as AdministradorFuncionarioController;
use App\Http\Controllers\Movimentacao\MovimentacaoController as AdministradorMovimentacaoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
    return redirect()->route('administrador.index');
});

Route::group(['prefix' => 'login'], function(){
    Route::get('administrador', [LoginController::class, 'showLoginAdministrador'])->name('login.administrador');
    Route::post('administrador', [LoginController::class, 'postLoginAdministrador'])->name('login.administrador.post');
});

Route::group(['prefix' => 'administrador', 'middleware' => ['auth:administrador']], function(){
    Route::get('/', function () {
        return redirect()->route('administrador.funcionario.index');
    })->name('administrador.index');

    //funcionario
    Route::get('funcionario', [AdministradorFuncionarioController::class, 'index'])->name('administrador.funcionario.index');
    Route::get('funcionario/extrato', [AdministradorFuncionarioController::class, 'extrato'])->name('administrador.funcionario.extrato');
    Route::get('funcionario/criar', [AdministradorFuncionarioController::class, 'create'])->name('administrador.funcionario.create');
    Route::get('funcionario/editar', [AdministradorFuncionarioController::class, 'update'])->name('administrador.funcionario.update');
    Route::post('funcionario/salvar', [AdministradorFuncionarioController::class, 'store'])->name('administrador.funcionario.store');
    Route::delete('funcionario/deletar', [AdministradorFuncionarioController::class, 'delete'])->name('administrador.funcionario.delete');

    //movimentacao
    Route::get('movimentacao', [AdministradorMovimentacaoController::class, 'index'])->name('administrador.movimentacao.index');
    Route::get('movimentacao/criar', [AdministradorMovimentacaoController::class, 'create'])->name('administrador.movimentacao.create');
    Route::post('movimentacao/get-funcionarios', [AdministradorMovimentacaoController::class, 'getFuncionarios'])->name('administrador.movimentacao.getFuncionarios');
    Route::post('movimentacao/salvar', [AdministradorMovimentacaoController::class, 'store'])->name('administrador.movimentacao.store');

    Route::post('administrador/logout', [LoginController::class, 'logoutAdministrador'])->name('administrador.logout');
});
