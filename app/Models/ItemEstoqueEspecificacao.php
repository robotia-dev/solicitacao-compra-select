<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ItemEstoqueEspecificacao extends Model
{
    use HasFactory;
    protected $table = 'item_estoque_especificacao';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'empresa', 'revenda', 'client', 'item_estoque', 'item_especificacao', 'dta_alteracao'
    ];

    public function createEspecificacao($data)
    {
        return self::create([
            'empresa' => $data['empresa'],
            'revenda' => $data['revenda'],
            'client' => $data['client'],
            'item_estoque' => $data['item_estoque'],
            'item_especificacao' => $data['item_especificacao'],
            'dta_alteracao' => NOW()
        ]);
    }
}