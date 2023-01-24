<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PecDemonstrativoConta extends Model
{
    use HasFactory;
    protected $table = 'pec_demonstrativo_conta';
    protected $primaryKey = 'conta';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'linha', 'nome_conta', 'dta_alteracao', 'empresa', 'revenda', 'client','origem'
    ];
    public function linha()
    {
        return $this->belongsTo(PecDemonstrativoLinha::class, 'linha', 'linha');
    }

    public function createConta($data)
    {
        return self::create([
            'linha' => $data['linha'],
            'nome_conta' => $data['nome_conta'],
            'dta_alteracao' => NOW(),
            'empresa' => $data['empresa'],
            'revenda' => $data['revenda'],
            'client' => $data['client'],
            'origem' => $data['origem'],
        ]);
    }
   
}
