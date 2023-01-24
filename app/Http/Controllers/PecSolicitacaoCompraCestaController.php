<?php

namespace App\Http\Controllers;

use App\Models\PecSolicitacaoCompraCesta;
use Illuminate\Http\Request;

class PecSolicitacaoCompraCestaController extends Controller
{
    public function createCesta(Request $request)
    {
        $request->validate([
            'compra' => 'required|exists:pec_solicitacao_compra,compra',
            'empresa' => 'required|integer',
            'revenda' => 'required|integer',
            'client' => 'required|integer',
            'descricao_compra' => 'required|string',
            'quantidade' => 'required|integer',
            'valor_unitario' => 'required|numeric',
            'valor_total' => 'required|numeric',
        ]);

        $data = $request->all();
        try {
            PecSolicitacaoCompraCesta::createCesta($data);
            return response()->json(['message' => 'Cesta de compra criada com sucesso'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
