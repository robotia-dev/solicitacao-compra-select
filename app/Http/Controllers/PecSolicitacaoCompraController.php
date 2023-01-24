<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PecSolicitacaoCompra;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PecSolicitacaoCompraController extends Controller
{
    /**
     * @OA\Post(
     *      path="/solicitacao-compra",
     *      tags={"Solicitação de Compra"},
     *      summary="Cria uma nova solicitação de compra",
     *      description="Cria uma nova solicitação de compra no sistema",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="descricao_compra", type="string", description="Descrição da compra"),
     *              @OA\Property(property="fornecedor", type="string", description="Fornecedor"),
     *              @OA\Property(property="forma_pagamento", type="string", description="Forma de pagamento"),
     *              @OA\Property(property="modalidade", type="string", description="Modalidade"),
     *              @OA\Property(property="empresa", type="string", description="Empresa"),
     *              @OA\Property(property="revenda", type="string", description="Revenda"),
     *              @OA\Property(property="client", type="string", description="Cliente"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Solicitação de compra criada",
     *          @OA\JsonContent(
     *              @OA\Property(property="success", type="string", description="Mensagem de sucesso")
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Dados inválidos",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", description="Mensagem de erro")
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Erro interno",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", description="Mensagem de erro")
     *          )
     *      )
     * )
     */

    public function showForm(){
        return view('solicitarCompraFormulario', ['empresa'=> ['1']]);
    }


    public function showCestaItens(){
        return view('solicitarCompraCesta');
    }
    public static function getListSolicitacoes(){
        $dados = PecSolicitacaoCompra::all();
        return $dados;
    }
    public static function showprintForm(){
        return view('formularioImpressaoCompra');
    }


    public function listSolicitacoes(){
        $dados = PecSolicitacaoCompra::all();
        return view('listagemSolicitacoesCompra',['dado'=> $dados]);
    }
    public function createSolicitacaoCompra(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'descricao_compra' => 'required',
            'fornecedor' => 'required',
            'forma_pagamento' => 'required',
            'modalidade' => 'required',
            'empresa' => 'required',
            'revenda' => 'required',
            'client' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        try {
            PecSolicitacaoCompra::createSolicitacao([
                'descricao_compra' => $request->descricao_compra,
                'dta_solicitacao' => NOW(),
                'fornecedor' => $request->fornecedor,
                'forma_pagamento' => $request->forma_pagamento,
                'modalidade' => $request->modalidade,
                'empresa' => $request->empresa,
                'revenda' => $request->revenda,
                'client' => $request->client
            ]);
            return response()->json(['success' => 'Solicitação de compra criada'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }	    
    }
}
