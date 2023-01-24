<?php

namespace App\Http\Controllers;

use App\Models\PecDemonstrativoConta;
use App\Models\PecDemonstrativoLinha;

use Illuminate\Http\Request;

class PecDemonstrativoContaController extends Controller
{ /**
    * @OA\Post(
    *      path="/demonstrativo/conta",
    *      tags={"Demonstrativo"},
    *      summary="Cria uma nova conta no demonstrativo",
    *      description="Cria uma nova conta no demonstrativo no sistema",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(
    *              @OA\Property(property="linha", type="string", description="Linha"),
    *              @OA\Property(property="nome_conta", type="string", description="Nome da conta"),
    *              @OA\Property(property="empresa", type="integer", description="Empresa"),
    *              @OA\Property(property="revenda", type="integer", description="Revenda"),
    *              @OA\Property(property="client", type="integer", description="Cliente"),
     *  @OA\Property(property="origem", type="integer", description="Origem"),
    *          )
    *      ),
    *      @OA\Response(
    *          response=201,
    *          description="Conta criada com sucesso",
    *          @OA\JsonContent(
    *              @OA\Property(property="message", type="string", description="Mensagem de sucesso")
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
    *          response=404,
    *          description="Linha não encontrada",
    *          @OA\JsonContent(
    *              @OA\Property(property="error", type="string", description="Mensagem de erro")
    *          )
    *      )
    * )
    *
     * @OA\Put(
     *      path="/demonstrativo/conta/{linha}",
     *      tags={"Demonstrativo"},
     *      summary="Atualiza uma conta no demonstrativo",
     *      description="Atualiza uma conta no demonstrativo no sistema",
     *      @OA\Parameter(
     *          name="linha",
     *          in="path",
     *          required=true,
     *          description="ID da linha",
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="nome_conta", type="string", description="Nome da conta"),
     *              @OA\Property(property="empresa", type="integer", description="Empresa"),
     *              @OA\Property(property="revenda", type="integer", description="Revenda"),
     *              @OA\Property(property="client", type="integer", description="Cliente"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Conta atualizada com sucesso",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", description="Mensagem de sucesso")
     *          )
     *      )
     * )
     */


    

    public function createConta(Request $request)
    {
        $request->validate([
            'linha' => 'required|exists:pec_demonstrativo_linha_cadastro,linha',
            'nome_conta' => 'required|string',
            'empresa' => 'required|integer',
            'revenda' => 'required|integer',
            'client' => 'required|integer',
            'origem' => 'required|integer',
        ]);

        $data = $request->all();
        $linha = PecDemonstrativoLinha::findOrFail($data['linha']);
        if ($linha) {
            $conta = new PecDemonstrativoConta();
            $conta->createConta($data);
            return response()->json(['message' => 'Conta criada com sucesso'], 201);
        } else {
            return response()->json(['error' => 'Linha não encontrada'], 400);
        }
    }
       public function updateConta(Request $request){
        $request->validate([
            'linha' => 'required|exists:pec_demonstrativo_linha_cadastro,linha',
            'nome_conta' => 'required|string',
            'empresa' => 'required|integer',
            'revenda' => 'required|integer',
            'origem' => 'required|integer',
            'client' => 'required|integer',
        ]);
        $data = $request->all();
        $conta=PecDemonstrativoConta::findOrFail($data['linha']);
       }
}
