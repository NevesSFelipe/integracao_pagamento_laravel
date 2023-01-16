<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'valor_total',
        'valor_frete',
        'data',
        'id_cliente',
        'id_loja',
        'id_situacao'
    ];
}
