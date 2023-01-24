<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemEstoqueDependencia;

class ItemEstoqueDependenciaController extends Controller
{


/**
 * @OA\Post(
 *      path="/get-dependenciabycliente",
 *   tags={"Relacional - Itens"},
 *      summary="Get list of dependent items by client and item estoque",
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
 */

/**
 * @OA\Post(
 *      path="/create-dependencia",
 *      summary="Create dependent item",
 *   tags={"Relacional - Itens"},
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              @OA\Property(property="empresa", type="integer", description="Company id"),
 *              @OA\Property(property="revenda", type="integer", description="Reseller id"),
 *              @OA\Property(property="item_estoque_principal", type="integer", description="Main item id"),
 *              @OA\Property(property="item_estoque_secundario", type="integer", description="Secondary item id"),
 *              @OA\Property(property="relacao", type="string", description="Relation type"),
 *              @OA\Property(property="dependencia_multipla", type="string", description="Multiple dependency"),
 *              @OA\Property(property="client", type="integer", description="Client id"),
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation"
 *       ),
 *      @OA\Response(response=400, description="Bad request"),
 *      @OA\Response(response=404, description="Resource Not Found"),
 * )
 */


    public function getDependencia(Request $request)
    
    {
        $request->validate([
            'client' => 'required',
            'item_estoque' => 'required',
        ]);
        $client = $request->input('client');
        $itemEstoque = $request->input('item_principal');

            return ItemEstoqueDependencia::select('empresa','revenda','item_principal', 'item_dependente')
                                         ->where('item_principal', $itemEstoque)->where('client', $client)
                                         ->get()
                                         ->toJson();
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createDependencia(Request $request)
    {
        $request->validate([
            'empresa' => 'required',
            'revenda' => 'required',
            'item_estoque_principal' => 'required',
            'item_estoque_secundario' => 'required',
            'relacao' => 'required',
            'dependencia_multipla' => 'required',
            'client' => 'required',
        ]);
        $data = $request->all();
        $dependencia = new ItemEstoqueDependencia();
        $dependencia->createDependencia($data);
        return response()->json(['message' => 'Dependencia criada com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
