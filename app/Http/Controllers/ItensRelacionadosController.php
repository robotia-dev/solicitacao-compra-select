<?php

namespace App\Http\Controllers;

use App\Models\ItensRelacionados;
use Illuminate\Http\Request;

class ItensRelacionadosController extends Controller{
  /**
 * @OA\Post(
 *      path="/createrelacao",
 *      summary="Create item relationship",
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              @OA\Property(property="empresa", type="integer", description="Company id"),
 *              @OA\Property(property="revenda", type="integer", description="Reseller id"),
 *              @OA\Property(property="item_estoque_principal", type="integer", description="Primary item id"),
 *              @OA\Property(property="item_estoque_relacionado", type="integer", description="Related item id"),
 *              @OA\Property(property="relacao_multipla", type="string", description="Multiple relationship"),
 *              @OA\Property(property="client", type="integer", description="Client id"),
 *          )
 *      ),
 *      @OA\Response(
 *          response=201,
 *          description="Successful operation"
 *       ),
 *      @OA\Response(response=400, description="Bad request"),
 * )
 * 
 * 
 * 
 *  @OA\Post(
 *      path="/getrelacaobycliente",
 *      summary="Get relationship by client and primary item",
 *  @OA\Parameter(
 *          name="client",
 *          in="query",
 *          description="Client id",
 *          required=true,
 *          @OA\Schema(
 *              type="int"
 *          )
 *      ),
 *  @OA\Parameter(
 *          name="item_estoque_principal",
 *          in="query",
 *          description="Primary item id",
 *          required=true,
 *          @OA\Schema(
 *              type="int"
 *          )
 *      ),
 * 
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation"
 *       ),
 *      @OA\Response(response=400, description="Bad request"),
 *      @OA\Response(response=404, description="Resource Not Found"),
 * )
 */
  public function createRelacao(Request $request)
  {
      $request->validate([
          'empresa' => 'required|integer',
          'revenda' => 'required|integer',
          'item_estoque_principal' => 'required|integer',
          'item_estoque_relacionado' => 'required|integer',
          'relacao_multipla' => 'required|string',
          'client' => 'required|integer',
      ]);
  

      $data = $request->all();
      $relacao = new ItensRelacionados();
      $relacao->createRelacao($data);
      return response()->json(['message' => 'Relacao criada com sucesso'], 201);

  }
  public function getRelacaoByClienteAndItemEstoque(Request $request)
  {
      $request->validate([
          'client' => 'required',
          'item_estoque_principal' => 'required',
      ]);

      $client = $request->input('client');
      $itemEstoquePrincipal = $request->input('item_estoque_principal');

      $relacao = ItensRelacionados::where('client', $client)
                                  ->where(function ($query) use ($itemEstoquePrincipal) {
                                      $query->where('item_estoque_principal', $itemEstoquePrincipal)
                                            ->orWhere('item_estoque_relacionado', $itemEstoquePrincipal);
                                  })
                                  ->get(['empresa','revenda','item_estoque_principal', 'item_estoque_relacionado', 'relacao_multipla']);
      
      if (!$relacao) {
          return response()->json(['message' => 'Relation not found']);
      }

      return response()->json($relacao, 200);
  }
}