<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class ClientOrca extends Model
{
    use HasFactory;
    protected $table = 'client_orca';
    protected $primaryKey = 'client';
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'client_name','dta_cadastro','funcao'
    ];
}
