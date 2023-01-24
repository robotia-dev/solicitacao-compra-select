<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PecDemonstrativoLinha;
use App\Models\PecDemonstrativoConta;
use SebastianBergmann\Type\NullType;

class PecDemonstrativoLinhaController extends Controller
{
      /**
     * @OA\Post(
     *      path="/demonstrativo/linha",
     *      tags={"Demonstrativo"},
     *      summary="Cria uma nova linha no demonstrativo",
     *      description="Cria uma nova linha no demonstrativo no sistema",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="nome_linha", type="string", description="Nome da linha"),
     *              @OA\Property(property="tipo_linha", type="string", description="Tipo da linha"),
     *              @OA\Property(property="empresa", type="integer", description="Empresa"),
     *              @OA\Property(property="revenda", type="integer", description="Revenda"),
     *              @OA\Property(property="client", type="integer", description="Cliente"),
     *              @OA\Property(property="origem", type="integer", description="Origem"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Linha criada com sucesso",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", description="Mensagem de sucesso")
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Erro de validação",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="object", description="Erros de validação")
     *          )
     *      )
     * )
     * 

     * @OA\Post(
     *      path="/demonstrativo/linhas",
     *      tags={"Demonstrativo"},
     *      summary="Retorna linhas do demonstrativo por cliente e empresa",
     *      description="Retorna linhas do demonstrativo por cliente e empresa",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="client", type="integer", description="ID do cliente"),
     *              @OA\Property(property="empresa", type="integer", description="ID da empresa"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Linhas encontradas",
     *          @OA\JsonContent(
     *              @OA\Property(property="linha", type="integer", description="ID da linha"),
     *              @OA\Property(property="nome_linha", type="string", description="Nome da linha")
     * )))
     * 
     * 
     */


 

    public function createLinha(Request $request)
    {
        $request->validate([
            'nome_linha' => 'required|string',
            'tipo_linha' => 'required|string',
            'empresa' => 'required|integer',
            'revenda' => 'required|integer',
            'client' => 'required|integer',
           
        ]);
    
        $data = $request->all();
        $linha = new PecDemonstrativoLinha();
        $linha->createLinha($data);
        return response()->json(['message' => 'Linha criada com sucesso'], 201);
    }

      public function getLinhasByClientAndEmpresa(Request $request)
    {
        $request->validate([
            'client' => 'required',
            'empresa' => 'required',
        ]);

        $client = $request->input('client');
        $empresa = $request->input('empresa');

        $data= PecDemonstrativoLinha::select('linha', 'nome_linha', 'tipo_linha', 'revenda', 'empresa')
        ->where('client', $client)
        ->where('empresa', $empresa)
        ->get()
        ->toJson();
        if ($data!=NULL){
            return ($data);
        }else{
            return False;
        }

       
    }

    public function getContasByEmpresaAndClient(Request $request)
    {
        $request->validate([
            'empresa' => 'required',
            'client' => 'required',
        ]);

        $empresa = $request->input('empresa');
        $client = $request->input('client');

        $linhas = PecDemonstrativoLinha::where('empresa', $empresa)->where('client', $client)->get();
        $contasPorLinha = [];
        foreach ($linhas as $linha) {
            $contas = PecDemonstrativoConta::where('linha', $linha->linha)->get();
            $contasPorLinha[] = ['linha' => $linha->nome_linha, 'contas' => $contas];
        }

        return response()->json($contasPorLinha);
    }
}

