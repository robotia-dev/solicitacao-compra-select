<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PecSolicitacaoCompra extends Model
{
    use HasFactory;

    protected $table = 'pec_solicitacao_compra';
    protected $primaryKey = 'compra';
    public $timestamps = false;

    protected $fillable = [
        'descricao_compra', 'dta_solicitacao', 'fornecedor', 'forma_pagamento', 'modalidade', 'empresa', 'revenda', 'client','autorizador','solicitante'
    ];

    public function createCompra($data)
    {
        return self::create([
            'descricao_compra' => $data['descricao_compra'],
            'dta_solicitacao' => NOW(),
            'fornecedor' => $data['fornecedor'],
            'forma_pagamento' => $data['forma_pagamento'],
            'modalidade' => $data['modalidade'],
            'empresa' => $data['empresa'],
            'revenda' => $data['revenda'],
            'client' => $data['client'],
            'autorizador' => $data['autorizador'],
            'solicitante' => $data['solicitante']
        ]);
    }

    public function getComprasByNumeroCompra($numero_compra,$client)
{
    return self::where('compra', $numero_compra)->where('client',$client)->get();
}


public static function createSolicitacaoCompra($data)
{
    try {
        $validatedData = validator()->make($data, [
            'descricao_compra' => 'required',
            'fornecedor' => 'required',
            'forma_pagamento' => 'required',
            'modalidade' => 'required',
            'empresa' => 'required',
            'revenda' => 'required',
            'client' => 'required'
        ]);

        if ($validatedData->fails()) {
            return response()->json(['error' => 'Os dados fornecidos estão incompletos ou inválidos.'], 400);
        }

        return self::create([
            'descricao_compra' => $data['descricao_compra'],
            'dta_solicitacao' => NOW(),
            'fornecedor' => $data['fornecedor'],
            'forma_pagamento' => $data['forma_pagamento'],
            'modalidade' => $data['modalidade'],
            'empresa' => $data['empresa'],
            'revenda' => $data['revenda'],
            'client' => $data['client']
        ]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Ocorreu um erro ao criar a solicitação.'], 500);
    }
}
}
