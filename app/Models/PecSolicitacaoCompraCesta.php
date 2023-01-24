<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PecSolicitacaoCompraCesta extends Model
{
    use HasFactory;

    protected $table = 'pec_solicitacao_compra_cesta';
    protected $primaryKey = 'item_numerador';
    public $timestamps = false;

    protected $fillable = [
        'compra',
        'empresa',
        'revenda',
        'client',
        'dta_inclusao',
        'descricao_compra',
        'quantidade',
        'valor_unitario',
        'valor_total'
    ];
    public function compra()
    {
        return $this->belongsTo(PecSolicitacaoCompra::class, 'compra', 'compra');
    }
    public function createCesta($data)
    {
        return self::create([
            'compra' => $data['compra'],
            'empresa' => $data['empresa'],
            'revenda' => $data['revenda'],
            'client' => $data['client'],
            'dta_inclusao' => NOW(),
            'descricao_compra' => $data['descricao_compra'],
            'quantidade' => $data['quantidade'],
            'valor_unitario' => $data['valor_unitario'],
            'valor_total' => $data['valor_total'],
        ]);
    }

    public function getCestasByCompra($compra_id,$client)
    {
        return self::where('compra', $compra_id)->where('client',$client)->get();
    }
}
