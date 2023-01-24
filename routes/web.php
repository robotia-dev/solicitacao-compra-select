<?php

use App\Http\Controllers\ItemEstoqueDependenciaController;
use App\Http\Controllers\PecSolicitacaoCompraController;
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

Route::get('/item_dependente/{item_estoque}', [ItemEstoqueDependenciaController::class,'index']);



Route::get('/create-solicitacao-managentement', [PecSolicitacaoCompraController::class,'showForm']);
Route::get('/list-solicitacao-managentement', [PecSolicitacaoCompraController::class,'listSolicitacoes'])->name('compras.list');
Route::get('/formulario-solicitacao-impressao', [PecSolicitacaoCompraController::class,'showprintForm'])->name('form.print');


Route::post('/create-solicitacao-managentement', [PecSolicitacaoCompraController::class,'createSolicitacaoCompra'])->name('compras.store');
