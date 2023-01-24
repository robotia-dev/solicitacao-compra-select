<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PecDemonstrativoLinha extends Model
{
    use HasFactory;

    protected $table = 'pec_demonstrativo_linha_cadastro';
    protected $primaryKey = 'linha';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'nome_linha',
        'tipo_linha',
        'dta_criacao',
        'client',
        'empresa',
        'revenda'
    ];

    public function createLinha($data)
    {
        return self::create([
            'nome_linha' => $data['nome_linha'],
            'tipo_linha' => $data['tipo_linha'],
            'dta_criacao' => NOW(),
            'client' => $data['client'],
            'empresa' => $data['empresa'],
            'revenda' => $data['revenda'],
        ]);
    }
    public  function getLinhasByClient( $client)
    {
        return self::where('client', $client)->get();
    }

}
