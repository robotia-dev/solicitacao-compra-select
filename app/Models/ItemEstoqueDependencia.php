<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemEstoqueDependencia extends Model
{
    use HasFactory;
    protected $table = 'item_estoque_dependencia';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = [
        'empresa', 'revenda','item_estoque_principal','item_estoque_secundario','relacao','dependencia_multipla','client','dta_relacao'
    ];

    public function createDependencia($data)
    {
        return self::create([
            'empresa' => $data['empresa'],
            'revenda' => $data['revenda'],
            'item_estoque_principal' => $data['item_estoque_principal'],
            'item_estoque_secundario' => $data['item_estoque_secundario'],
            'relacao' => $data['relacao'],
            'dependencia_multipla' => $data['dependencia_multipla'],
            'client' => $data['client'],
            'dta_relacao' => NOW()
        ]);
        $dependencia = ItemEstoqueDependencia::createDependencia($data);

        return response()->json(['message' => 'Dependencia criada com sucesso'], 201);
    }
}