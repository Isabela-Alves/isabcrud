<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sistema extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', //meu bancoo,essas sao as entidades da minha tabela//
        'endereco',
        'telefone',
        'especialidade',
        'preco',
        'user_id'
    ];
}
