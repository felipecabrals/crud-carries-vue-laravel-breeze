<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carries extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    protected $fillable = [
        'nome',
        'endereco',
        'bairro',
        'cidade',
        'uf',
        'limite_credito',
        'data_analise_credito',
        'cep'
    ];
}
