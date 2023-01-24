<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensRelacionados extends Model
{
    use HasFactory;
    protected $table = 'item_estoque_relacao';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'empresa', 'revenda','item_estoque_principal','item_estoque_relacionado','relacao_multipla','client','dta_relacao'
    ];
    

    public function createRelacao($data)
    {
        return self::create([
            'empresa' => $data['empresa'],
            'revenda' => $data['revenda'],
            'item_estoque_principal' => $data['item_estoque_principal'],
            'item_estoque_relacionado' => $data['item_estoque_relacionado'],
            'relacao_multipla' => $data['relacao_multipla'],
            'client' => $data['client'],
            'dta_relacao' => NOW()
        ]);
    }
 
}

