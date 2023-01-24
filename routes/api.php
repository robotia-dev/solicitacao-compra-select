<?php

use App\Http\Controllers\ItemEstoqueDependenciaController;
use App\Http\Controllers\ItemEstoqueEspecificacaoController;
use App\Http\Controllers\ItensRelacionadosController;
use App\Http\Controllers\PecDemonstrativoContaController;
use App\Http\Controllers\PecDemonstrativoLinhaController;
use App\Http\Controllers\PecSolicitacaoCompraController;
use App\Models\ItemEstoqueEspecificacao;
use App\Models\PecDemonstrativoConta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 // rotas de relacao de item
Route::post('/create-relacao', [ItensRelacionadosController::class, 'createRelacao']);

Route::post('/create-dependencia', [ItemEstoqueDependenciaController::class, 'createDependencia']);

Route::post('/create-especificacao-item', [ItemEstoqueEspecificacaoController::class, 'createEspecificacao']);
Route::post('/get-especificacao-item', [ItemEstoqueEspecificacaoController::class, 'getEspecificacaoByClienteAndItemEstoque']);



// Rotas Demonstrativo
Route::post('/demonstativo/linha', [PecDemonstrativoLinhaController::class, 'createLinha']);

Route::post('/demonstativo/conta', [PecDemonstrativoContaController::class, 'createConta']);

// Rotas Solicitacao Compra

Route::post('/create-new-solicitacao-compra', [PecSolicitacaoCompraController::class, 'createSolicitacaoCompra']);

Route::post('/insert-new-item-solicitacao-compra', [PecSolicitacaoCompraController::class, 'createSolicitacaoCompra']);








Route::post('/get-dependencia', [ItemEstoqueDependenciaController::class, 'getDependencia']);

Route::post('/getrelacaobycliente', [ItensRelacionadosController::class, 'getRelacaoByClienteAndItemEstoque']);

Route::post('/get-linha-demonstativo', [PecDemonstrativoLinhaController::class, 'getContasByEmpresaAndClient']);






