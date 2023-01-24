<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemEstoqueEspecificacao;

class ItemEstoqueEspecificacaoController extends Controller
{
/**
 * @OA\Post(
 *      path="/get-especificacaobycliente",
 *      summary="Get item specification by client and item",
 *   tags={"Relacional - Itens"},
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              @OA\Property(property="client", type="integer", description="Client id"),
 *              @OA\Property(property="item_estoque", type="integer", description="Item id"),
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation"
 *       ),
 *      @OA\Response(response=400, description="Bad request"),
 *      @OA\Response(response=404, description="Resource Not Found"),
 * )
 * 
 * @OA\Post(
 *      path="/create-especificacao",
 *      summary="Create item specification",
 *   tags={"Relacional - Itens"},
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              @OA\Property(property="empresa", type="string", description="Company"),
 *              @OA\Property(property="revenda", type="string", description="Reseller"),
 *              @OA\Property(property="client", type="integer", description="Client id"),
 *              @OA\Property(property="item_estoque", type="integer", description="Item id"),
 *              @OA\Property(property="item_especificacao", type="string", description="Item specification"),
 *          )
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Successful operation"
 *       ),
 *      @OA\Response(response=400, description="Bad request"),
 * )
 * 
 */



    public function createEspecificacao(Request $request)
    {
        $request->validate([
            'empresa' => 'required',
            'revenda' => 'required',
            'client' => 'required',
            'item_estoque' => 'required',
            'item_especificacao' => 'required',
        ]);
        $data = $request->all();
        ItemEstoqueEspecificacao::createEspecificacao($data);
        return response()->json(['message' => 'Especificação criada com sucesso'], 201);
    }
    public function getEspecificacaoByClienteAndItemEstoque(Request $request)
    {
        $request->validate([
            'client' => 'required',
            'item_estoque' => 'required',
        ]);

        $client = $request->input('client');
        $itemEstoque = $request->input('item_estoque');

        $itemEspecificacao = ItemEstoqueEspecificacao::where('client', $client)
                                                    ->where('item_estoque', $itemEstoque)
                                                    ->get();

        if (!$itemEspecificacao) {
            return response()->json(['message' => 'Especificação não encontrada']);
        }

}
}