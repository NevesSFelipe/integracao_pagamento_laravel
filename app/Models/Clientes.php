<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'cpf_cnpj',
        'email',
        'tipo_pessoa',
        'data_nasc',
        'id_loja'
    ];
}
